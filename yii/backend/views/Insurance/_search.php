<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Insurancessearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="insurances-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'overview') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'benefits_link') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
