<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\CountriesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="countries-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <!-- <?= $form->field($model, 'id',['options' => ['class' => 'mt-2']])  ?> -->

    <?= $form->field($model, 'code',['options' => ['class' => 'mt-2']])  ?>

    <?= $form->field($model, 'country',['options' => ['class' => 'mt-2']])  ?>

    <?= $form->field($model, 'callCode',['options' => ['class' => 'mt-2']])  ?>

    <?= $form->field($model, 'zone',['options' => ['class' => 'mt-2']])  ?>

    <?php echo $form->field($model, 'currency') ?>
    <?= $form->field($model, 'active', ['options' => ['class' => 'mt-2']])
    ->dropDownList(
        [
            '' => 'Select Status', 
            '1' => 'Active',
            '0' => 'Inactive',
        ],
        ['class' => 'form-select']
    )
    ; 
?>

 
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
