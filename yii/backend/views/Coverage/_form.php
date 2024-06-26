<?php

use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
/** @var yii\web\View $this */
/** @var common\models\PlansCoverage $model */
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
                <?php $form = ActiveForm::begin(); ?>



                <div class="row">


                    <div class="col-sm-6">
                  
                        <div class="mb-4">
                            <label for="price" class="form-label">Title</label>
                            <?= $form->field($model, 'item_id')->dropDownList(
                                \yii\helpers\ArrayHelper::map(
                                    \common\models\PlansItems::find()->all(),
                                    'id',
                                    'title'
                                ),
                                [
                                    'class' => 'js-select form-select',
                                    'autocomplete' => 'off',
                                    'data-hs-tom-select-options' => '{"placeholder": "Select plan..."}',
                                    'style' => 'height:53px'
                                ]
                            )->label(false) ?>

                        </div>
              
                    </div>


                    <div class="col-sm-6">
                        <div class="mb-4">
                            <label for="status" class="form-label">Status</label>


                            <div class="tom-select-custom">
                                <?= $form->field($model, 'YorN')->dropDownList(
                                    [
                                        'Active' => 'Yes',
                                        'Inactive' => 'No',
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







                <label class="form-label">Description <span class="form-label-secondary">(Optional)</span></label>

                <div class="mb-4">
                    <div>
                        <?= $form->field($model, 'description')->textarea([
                            'class' => 'form-control',
                            'rows' => '7',
                        ])->label(false) ?>
                    </div>
                </div>













                <!-- Submit Button -->


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