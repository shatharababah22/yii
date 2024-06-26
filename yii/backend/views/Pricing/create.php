<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Pricing $model */

$this->title = 'Create Pricing';
$this->params['breadcrumbs'][] = ['label' => 'Pricings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


