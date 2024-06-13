<?php

namespace backend\controllers;

use Yii;
use common\models\Insurances;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;

class InsurancesController extends ActiveController
{


    public $modelClass = 'app\models\Insurances';

    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => \yii\filters\ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            'verbs' => [
                'class' => \yii\filters\VerbFilter::class,
                'actions' => [
                    'index' => ['GET'],
                    'view' => ['GET'],
                    'create' => ['POST'],
                    'update' => ['PUT', 'PATCH'],
                    'delete' => ['DELETE'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $insurances = Insurances::find()->all();
        return $insurances;
    }

    public function actionView($id)
    {
        return $this->findModel($id);
    }

    public function actionCreate()
    {
        $model = new Insurances();
        $model->load(Yii::$app->request->post(), '');
        
        if ($model->save()) {
            Yii::$app->response->statusCode = 201; 
            return $model;
        } else {
            Yii::$app->response->statusCode = 422; 
            return ['errors' => $model->errors];
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->load(Yii::$app->request->getBodyParams(), '');

        if ($model->save() === false && !$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to update the object for unknown reason.');
        }

        return $model;
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        Yii::$app->response->statusCode = 204; // No Content
        return null;
    }

    protected function findModel($id)
    {
        $model = Insurances::findOne($id);
        if ($model !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested Insurances does not exist.');
    }
}
