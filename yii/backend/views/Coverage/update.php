<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PlansCoverage $model */

$this->title = 'Update Plans Coverage: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Plans Coverages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

