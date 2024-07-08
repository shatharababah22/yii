<?php

namespace backend\controllers;

use common\models\Plans;
use common\models\Pricing;
use common\models\PricingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

use yii\data\Pagination;
use yii\filters\AccessControl;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use common\models\UploadForm;
use Exception;
use yii\web\UploadedFile;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * PricingController implements the CRUD actions for Pricing model.
 */
class PricingController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'], // Allow only authenticated users
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Pricing models.
     *
     * @return string
     */



    public function actionExport()
    {
        $models = Pricing::find()->all();

        $durationLabels = [
            7 => '7 days',
            10 => '10 days',
            15 => '15 days',
            21 => '21 days',
            30 => '1 month',
            60 => '2 months',
            90 => '3 months',
            180 => '6 months',
            365 => '1 year',
            730 => '2 years',
            1095 => '3 years',
        ];

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Plan code');
        $sheet->setCellValue('B1', 'Duration');
        $sheet->setCellValue('C1', 'Passenger');
        $sheet->setCellValue('D1', 'Price');


        $headerStyle = [
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FF808080',
                ],
                'font' => [
                    'color' => [
                        'argb' => 'FFFFFFFF',
                    ],
                ],
            ],
        ];
        $sheet->getStyle('A1:D1')->applyFromArray($headerStyle);

        $row = 2;
        foreach ($models as $model) {
            $sheet->setCellValue('A' . $row, $model->plan->plan_code);

            $duration = isset($durationLabels[$model->duration]) ? $durationLabels[$model->duration] : $model->duration;
            $sheet->setCellValue('B' . $row, $duration);
            $sheet->setCellValue('C' . $row, $model->passenger);
            $sheet->setCellValue('D' . $row, $model->price);

            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Pricing.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        return Yii::$app->response->sendFile($temp_file, $fileName);
    }
    public function actionToggleDiscount()
    {
        $pricings = Pricing::find()->where(['!=', 'discount_price', 0])->all();
    

        $anyActive = Pricing::find()->where(['!=', 'discount_price', 0])->andWhere(['status' => 1])->exists();
    
        foreach ($pricings as $pricing) {
            $pricing->status = $anyActive ? 0 : 1;
            $pricing->save(false); 
        }
    
        
        Yii::$app->session->setFlash('success', 'Discount statuses have been toggled.');
    
        return $this->redirect(['index']);
    }
    
    
    public function actionIndex()
    {
        $searchModel = new PricingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
        $model = new UploadForm();
    
        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                $inputFile = 'images/' . $model->imageFile->baseName . '.' . $model->imageFile->extension;
                try {
                    $spreadsheet = IOFactory::load($inputFile);
                } catch (Exception $e) {
                    die('Error loading file "' . pathinfo($inputFile, PATHINFO_BASENAME) . '": ' . $e->getMessage());
                }
    
                $sheet = $spreadsheet->getActiveSheet();
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();
    
                $startRow = 2;
                for ($row = $startRow; $row <= $highestRow; $row++) {
                    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
    
                    $planCode = $rowData[0][0];
                    $plan = Plans::find()->where(['plan_code' => $planCode])->one();
                    if (!$plan) {
                        print_r("Plan with code " . $planCode . " not found.");
                        continue;
                    }
    
                    $existingPricing = Pricing::find()
                        ->where(['plan_id' => $plan->id, 'duration' => (int)$rowData[0][1]])
                        ->one();
    
                    if ($existingPricing) {
                        // print_r("Pricing entry for plan with code " . $planCode . " and duration " . (int)$rowData[0][1] . " already exists.");
                        continue;
                    }
    
                    $pricing = new Pricing();
                    $pricing->plan_id = $plan->id;
                    $pricing->duration = (int)$rowData[0][1];
                    $pricing->passenger = $rowData[0][2];
                    $pricing->price = $rowData[0][3];
    
                    if (!$pricing->save()) {
                        print_r($pricing->getErrors());
                    }
                }
            }
        }
    
        return $this->render('index', [
            'searchModel' => $searchModel,
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    

    /**
     * Displays a single Pricing model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pricing model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pricing();

        if ($this->request->isPost) {
          
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pricing model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            // dd($model);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pricing model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pricing model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Pricing the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pricing::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
