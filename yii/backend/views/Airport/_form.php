<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Airports $model */
/** @var yii\widgets\ActiveForm $form */
?>







        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= Url::to(['index']) ?>">Airports</a></li>
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
                        <h4 class="card-header-title">Airports information</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <?php $form = ActiveForm::begin([
                            'options' => ['enctype' => 'multipart/form-data'] // Important for file uploads
                        ]); ?>


<div class="mb-4">
                            <?= $form->field($model, 'name', ['options' => ['class' => 'mb-4']])->textInput([
                                'id' => 'productNameLabel',
                                
                                'data-bs-toggle' => 'tooltip',
                                'data-bs-placement' => 'top',
                                'title' => 'Products are the goods or services you sell.'
                            ])->label('Name <i class="bi-question-circle text-body ms-1"></i>', ['class' => 'form-label']) ?>

                        </div>
                        <!-- End Form -->

                        <div class="row">
                            <div class="col-sm-6">
                                <!-- Form -->
                                <div class="mb-4">

                                <label for="price" class="form-label">Airport Code</label>

                                    <div>
                                        <!-- <input type="text" class="form-control" name="weightName" id="Links" placeholder="0.0" aria-label="0.0"> -->

                                        <?= $form->field($model, 'code')->textInput(['class' => 'form-control  p-3'])->label(false) ?>

                                    </div>



                                    <!-- <small class="form-text">Used to calculate shipping rates at checkout and label prices during fulfillment.</small> -->
                                </div>
                                <!-- End Form -->
                            </div>


                            <div class="col-sm-6">
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="price" class="form-label">Countries</label>






                                    <?= $form->field($model, 'country_id')->dropDownList(
                                        \yii\helpers\ArrayHelper::map(
                                            \common\models\Countries::find()->all(),
                                            'id',
                                            'country'
                                        ),
                                        [
                                            'class' => 'js-select form-select',
                                            'autocomplete' => 'off',
                                            'data-hs-tom-select-options' => '{"placeholder": "Select countries..."}',
                                            'style' => 'height:53px'
                                        ]
                                    )->label(false) ?>

                                </div>
                                <!-- End Form -->
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-6">

                                <label for="price" class="form-label">City name</label>

                                <!-- Form -->
                                <div class="mb-4">
                                    <?= $form->field($model, 'cityName', ['options' => ['class' => 'mb-4']])->textInput([
                                        'id' => 'productNameLabel',

                                        'data-bs-toggle' => 'tooltip',
                                        'data-bs-placement' => 'top',

                                        'style' => 'height:53px'

                                    ])->label(false) ?>

                                </div>
                                <!-- End Form -->

                            </div>


                            <div class="col-sm-6">

                                <div class="mb-4">
                                    <label for="price" class="form-label"> City Code</label>





                                    <div class="mb-4">
                                        <?= $form->field($model, 'cityCode', ['options' => ['class' => 'mb-4']])->textInput([
                                            'id' => 'productNameLabel',

                                            'data-bs-toggle' => 'tooltip',

                                            'style' => 'height:53px'

                                        ])->label(false) ?>

                                    </div>

                                </div>

                            </div>

                        </div>
















                        <!-- Plan Code -->


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
    </div>
    <!-- End Content -->
</main>