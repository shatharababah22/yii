<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Airports $model */

$this->title = 'Create Airports';
$this->params['breadcrumbs'][] = ['label' => 'Airports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>





