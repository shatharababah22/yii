<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\PlansItems $model */
/** @var yii\widgets\ActiveForm $form */
?>








<div class="Benefit-form">

                <?php $form = ActiveForm::begin(); ?>


                <div class="row mb-2">
        
            <?= $form->field($model, 'title',['options' => ['class' => 'col-sm-8']])->textInput(['maxlength' => true]) ?>
      
       
    
        
    </div>

















    <div class="form-group d-flex justify-content-end ">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary save-button']) ?>
   
    </div>

    <?php ActiveForm::end(); ?>
            </div>
            <!-- End Card Body -->
        </div>
        <!-- End Card -->
    </div>
    <!-- End Col -->
</div>
<!-- End Row -->