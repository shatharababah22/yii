<?php

namespace backend\controllers;

use common\models\PlansItems;
use common\models\PlansItemsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use common\models\UploadForm;
use Exception;
use yii\web\UploadedFile;
use PhpOffice\PhpSpreadsheet\IOFactory;


// use PhpOffice\PhpSpreadsheet\IOFactory;
use yii;


/**
 * BenefitController implements the CRUD actions for PlansItems model.
 */
class BenefitController extends Controller
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



    public function actionExport()
    {
        $models = PlansItems::find()->all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        
        $sheet->setCellValue('A1', 'Title');
        $sheet->setCellValue('B1', 'Plan Code');
     

       
        $row = 2; 
        foreach ($models as $model) {
            $sheet->setCellValue('A' . $row, $model->title);
            $sheet->setCellValue('B' . $row, $model->plan_id);
            
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'plans_items_export.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        return Yii::$app->response->sendFile($temp_file, $fileName);
    }

    // public function actionImport(){
    //     $model = new UploadForm();
    
    //     if (Yii::$app->request->isPost) {
    //         $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
    //         if ($model->upload()) {
    //             $inputFile = 'images/' . $model->imageFile->baseName . '.' . $model->imageFile->extension;
    //             try {
    //                 $spreadsheet = IOFactory::load($inputFile);
    //             } catch (Exception $e) {
    //                 die('Error loading file "' . pathinfo($inputFile, PATHINFO_BASENAME) . '": ' . $e->getMessage());
    //             }
    
    //             $sheet = $spreadsheet->getActiveSheet();
    //             $highestRow = $sheet->getHighestRow();
    //             $highestColumn = $sheet->getHighestColumn();
    //             // dd($highestRow, $highestColumn);

    
    //             for ($row = 1; $row <= $highestRow; $row++) { // Start from the second row
    //                 $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
    //                 // dd("shata");
                    
    //                 $plans = new PlansItems();
    //                 $plans->title = $rowData[0][0]; 
    //                 $plans->plan_id = $rowData[0][1]; 
    //                 if (!$plans->save()) {
    //                     print_r($rowData);
    //                     print_r($plans->getErrors());
    //                 }
    //             }
    //             die('Import completed');
    //         }
    //     }
    //     return $this->render('import', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Lists all PlansItems models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PlansItemsSearch();
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
                  
                for ($row = 1; $row <= $highestRow; $row++) { 
                    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                    
                    
                    $plans = new PlansItems();
                    $plans->title = $rowData[0][0]; 
                    // $plans->plan_id = $rowData[0][1]; 
                    if (!$plans->save()) {
                        print_r($rowData);
                        print_r($plans->getErrors());
                    }
                }
                die('Import completed');
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'model' => $model,
            'dataProvider' => $dataProvider,
          
        ]);
    }

    /**
     * Displays a single PlansItems model.
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
     * Creates a new PlansItems model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PlansItems();

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
     * Updates an existing PlansItems model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PlansItems model.
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
     * Finds the PlansItems model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PlansItems the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PlansItems::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
