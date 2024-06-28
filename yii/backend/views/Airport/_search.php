<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\IAirportssearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="airports-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <!-- <?= $form->field($model, 'id',['options' => ['class' => 'mt-2']])  ?> -->

    <?= $form->field($model, 'code',['options' => ['class' => 'mt-2']])  ?>

    <?= $form->field($model, 'name',['options' => ['class' => 'mt-2']])  ?>

    <?= $form->field($model, 'cityCode',['options' => ['class' => 'mt-2']])  ?>

    <?= $form->field($model, 'cityName',['options' => ['class' => 'mt-2']])  ?>

    <?= $form->field($model, 'country_id', ['options' => ['class' => 'mt-2']])->dropDownList(
        \yii\helpers\ArrayHelper::map(
            \common\models\Countries::find()->all(),
            'id',
            'country'
        ),
        ['class' => 'form-select','prompt' => 'Select passenger']
    ) ?>
   <div class="offcanvas-footer ">
      <div class="row ">
        <div class="col">
          <div class="d-grid">
          <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
          </div>
        </div>
   
        <div class="col">
          <div class="d-grid">
        <?=Html::a('Reset', ['index'], ['class' => 'btn btn-white'])?>
        </div>
        </div>
    
      </div>
      
</div>

    <?php ActiveForm::end(); ?>

</div>
