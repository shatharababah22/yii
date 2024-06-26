<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Insurances $model */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Insurances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>




    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


