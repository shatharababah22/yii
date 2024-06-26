<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PlansCoverage $model */

$this->title = 'Create Plans Coverage';
$this->params['breadcrumbs'][] = ['label' => 'Plans Coverages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

