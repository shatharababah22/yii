<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Plans $model */
/** @var yii\widgets\ActiveForm $form */
?>






        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= Url::to(['index']) ?>">Plans</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= Html::encode($this->title) ?></li>
                        </ol>
                    </nav>


                  
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <div class="row">
            <div class="col-lg-11 mb-3 mb-lg-0">
                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Plans information</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <?php $form = ActiveForm::begin([
                            'options' => ['enctype' => 'multipart/form-data'] // Important for file uploads
                        ]); ?>



                        <div class="row">
                        <div class="col-sm-6">
                                <!-- Form -->
                                <div class="mb-4">

                                    <label for="Links" class="form-label">Name</label>

                                    <div>
                                        <!-- <input type="text" class="form-control" name="weightName" id="Links" placeholder="0.0" aria-label="0.0"> -->

                                        <?= $form->field($model, 'name')->textInput(['class' => 'form-control  p-3'])->label(false) ?>

                                    </div>



                                    <!-- <small class="form-text">Used to calculate shipping rates at checkout and label prices during fulfillment.</small> -->
                                </div>
                                <!-- End Form -->
                            </div>
                       

                            <div class="col-sm-6">
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="price" class="form-label">Insurance</label>






                                    <?= $form->field($model, 'insurance_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(
        \common\models\Insurances::find()->all(),
        'id',
        'name'
    ),
    [
        'class' => 'js-select form-select', 
        'autocomplete' => 'off',
        'data-hs-tom-select-options' => '{"placeholder": "Select Insurance..."}',
        'style'=>'height:53px'
    ]
)->label(false) ?>

                                </div>
                                <!-- End Form -->
                            </div>
                        </div>




                        <label for="price" class="form-label">Plan code</label>

                           <!-- Form -->
                           <div class="mb-4">
                            <?= $form->field($model, 'plan_code', ['options' => ['class' => 'mb-4']])->textInput([
                                'id' => 'productNameLabel',
                                
                                'data-bs-toggle' => 'tooltip',
                                'data-bs-placement' => 'top',
                                'title' => 'Products are the goods or services you sell.',
                                'style'=>'height:53px'

                            ])->label(false) ?>

                        </div>
                        <!-- End Form -->


                        <div class="row">
                            <div class="col-sm-6">
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="price" class="form-label">Max age</label>



                                    <div class="quantity-counter ">
                                        <div class="js-quantity-counter row align-items-center">
                                            <div class="col">
                                                <span class="d-block small">Select max age</span>

                                                <?= $form->field($model, 'max_age')->textInput(['class' => 'js-result form-control form-control-quantity-counter', 'value' => '1'])->label(false)->error(false) ?>

                                            </div> 
                                            <!-- End Col -->

                                            <div class="col-auto">
                                                <a class="js-minus btn btn-outline-secondary btn-xs btn-icon rounded-circle" href="javascript:;">
                                                    <svg width="8" height="2" viewBox="0 0 8 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0 1C0 0.723858 0.223858 0.5 0.5 0.5H7.5C7.77614 0.5 8 0.723858 8 1C8 1.27614 7.77614 1.5 7.5 1.5H0.5C0.223858 1.5 0 1.27614 0 1Z" fill="currentColor" />
                                                    </svg>
                                                </a>
                                                <a class="js-plus btn btn-outline-secondary btn-xs btn-icon rounded-circle" href="javascript:;">
                                                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 0C4.27614 0 4.5 0.223858 4.5 0.5V3.5H7.5C7.77614 3.5 8 3.72386 8 4C8 4.27614 7.77614 4.5 7.5 4.5H4.5V7.5C4.5 7.77614 4.27614 8 4 8C3.72386 8 3.5 7.77614 3.5 7.5V4.5H0.5C0.223858 4.5 0 4.27614 0 4C0 3.72386 0.223858 3.5 0.5 3.5H3.5V0.5C3.5 0.223858 3.72386 0 4 0Z" fill="currentColor" />
                                                    </svg>
                                                </a>
                                            </div>

                                            
        

                                            <!-- End Col -->
                                        </div>
  
                                        <!-- End Row -->

                                    </div>
                                    <?php if ($model->hasErrors('max_age')): ?>
        <div class="help-block">
            <?= $model->getFirstError('max_age') ?>
        </div>
    <?php endif; ?> 
                                </div>
                                <!-- End Form -->
                            </div>
                       

                            <div class="col-sm-6">
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="price" class="form-label">Min age</label>



                                    <div class="quantity-counter ">
                                        <div class="js-quantity-counter row align-items-center">
                                            <div class="col">
                                                <span class="d-block small">Select min age</span>

                                                <?= $form->field($model, 'min_age')->textInput(['class' => 'js-result form-control form-control-quantity-counter', 'value' => '1'])->label(false)->error(false) ?>

                                            </div> 
                                            <!-- End Col -->

                                            <div class="col-auto">
                                                <a class="js-minus btn btn-outline-secondary btn-xs btn-icon rounded-circle" href="javascript:;">
                                                    <svg width="8" height="2" viewBox="0 0 8 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0 1C0 0.723858 0.223858 0.5 0.5 0.5H7.5C7.77614 0.5 8 0.723858 8 1C8 1.27614 7.77614 1.5 7.5 1.5H0.5C0.223858 1.5 0 1.27614 0 1Z" fill="currentColor" />
                                                    </svg>
                                                </a>
                                                <a class="js-plus btn btn-outline-secondary btn-xs btn-icon rounded-circle" href="javascript:;">
                                                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 0C4.27614 0 4.5 0.223858 4.5 0.5V3.5H7.5C7.77614 3.5 8 3.72386 8 4C8 4.27614 7.77614 4.5 7.5 4.5H4.5V7.5C4.5 7.77614 4.27614 8 4 8C3.72386 8 3.5 7.77614 3.5 7.5V4.5H0.5C0.223858 4.5 0 4.27614 0 4C0 3.72386 0.223858 3.5 0.5 3.5H3.5V0.5C3.5 0.223858 3.72386 0 4 0Z" fill="currentColor" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Row -->

                                    </div>
                                    <?php if ($model->hasErrors('min_age')): ?>
        <div class="help-block">
            <?= $model->getFirstError('min_age') ?>
        </div>
    <?php endif; ?> 
                                </div>
                                <!-- End Form -->
                            </div>
                        </div>









                        <label class="form-label">Description <span class="form-label-secondary">(Optional)</span></label>

<div class="mb-4">
    <div>
        <?= $form->field($model, 'description')->textarea([
            'class' => 'form-control',
            'rows' => '7', // Set the number of visible rows
        ])->label(false) ?>
    </div>
</div>




<label class="form-label">Overview <span class="form-label-secondary">(Optional)</span></label>

<div class="mb-4">
    <div>
        <?= $form->field($model, 'overview')->textarea([
            'class' => 'form-control',
            'rows' => '7', // Set the number of visible rows
        ])->label(false) ?>
    </div>
</div>


                       
                   
                        <div class="form-group d-flex justify-content-end">
    <?= Html::submitButton('Save', [
        'class' => 'btn btn-primary', 
        'style' => 'width: 150px;'
    ]) ?>
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

