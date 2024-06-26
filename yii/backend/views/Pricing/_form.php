<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Pricing $model */
/** @var yii\widgets\ActiveForm $form */
?>









<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col-sm mb-2 mb-sm-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-no-gutter">
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= Url::to(['index']) ?>">Pricing</a></li>
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
                <h4 class="card-header-title">Pricing information</h4>
            </div>
            <!-- End Header -->
            <div class="card-body">
                <?php $form = ActiveForm::begin(); ?>

                <div class="row">
                    <div class="col-sm-6">
                        <!-- Form -->
                        <div class="mb-4">

                            <label for="price" class="form-label">Plan code</label>

                            <div>

                                <?= $form->field($model, 'plan_id')->dropDownList(
                                    \yii\helpers\ArrayHelper::map(
                                        \common\models\Plans::find()->all(),
                                        'id',
                                        'plan_code'
                                    ),
                                    [
                                        'class' => 'js-select form-select',
                                        'autocomplete' => 'off',
                                        'data-hs-tom-select-options' => '{"placeholder": "Select countries..."}',
                                        'style' => 'height:55px'
                                    ]
                                )->label(false) ?>
                            </div>



                        </div>
                        <!-- End Form -->
                    </div>


                    <div class="col-sm-6">
                        <!-- Form -->
                        <div class="mb-4">
                            <label for="price" class="form-label">Price</label>



                            <div class="quantity-counter ">
                                <div class="js-quantity-counter row align-items-center">
                                    <div class="col">
                                        <span class="d-block small">Select quantity</span>

                                        <?= $form->field($model, 'price')->textInput(['class' => 'js-result form-control form-control-quantity-counter', 'value' => '1'])->label(false) ?>

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
                        </div>
                        <!-- End Form -->
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-6">
                        <!-- Form -->
                        <div class="mb-4">
                            <label for="status" class="form-label">Passenger</label>


                            <div class="tom-select-custom">
                                <?= $form->field($model, 'passenger')->dropDownList(
                                    [
                                        'adult' => 'Adult',
                                        'child' => 'Child',
                                        'Infant' => 'INF',
                                    ],
                                    [
                                        'prompt' => 'Select a value...',
                                        'class' => 'js-select form-select',
                                        'autocomplete' => 'off',
                                        'style' => 'height:53px',
                                        'data-hs-tom-select-options' => json_encode([
                                            'placeholder' => 'Select a value...',
                                            'hideSearch' => true,

                                        ]),
                                    ]
                                )->label(false) ?>
                            </div>

                        </div>
                    </div>


                    <div class="col-sm-6">
                        <!-- Form -->
                        <div class="mb-4">
                            <label for="status" class="form-label">Duration</label>


                            <div class="tom-select-custom">
                                <?= $form->field($model, 'duration')->dropDownList(
                                    [
                                        '7' => '7 days',
                                        '10' => '10 days',
                                        '15' => '15 days',
                                        '21' => '21 days',
                                        '30' => '1 month',
                                        '60' => '2 months',
                                        '90' => '3 months',
                                        '180' => '6 months',
                                        '365' => '1 year',
                                        '730' => '2 years',
                                        '1095' => '3 years',
                                    ],
                                    [
                                        'prompt' => 'Select a value...',
                                        'class' => 'js-select form-select',
                                        'autocomplete' => 'off',
                                        'style' => 'height:53px',
                                        'data-hs-tom-select-options' => json_encode([
                                            'placeholder' => 'Select a value...',
                                            'hideSearch' => true,

                                        ]),
                                    ]
                                )->label(false) ?>
                            </div>
                            <!-- End Form -->
                        </div>
                    </div>

                </div>
















                <!-- Plan Code -->


                <!-- Submit Button -->
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'style' => 'width: 150px;']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <!-- End Card Body -->
        </div>
    </div>
    <!-- End Card -->
</div>
<!-- End Col -->
</div>
<!-- End Row -->