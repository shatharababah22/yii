<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Insurances $model */
/** @var yii\widgets\ActiveForm $form */


$this->registerJs("
function previewImage(event) {
    var input = event.target;
    var reader = new FileReader();

    reader.onload = function() {
        var defaultImage = document.getElementById('defaultImage');
        var darkImage = document.getElementById('darkImage');
        defaultImage.src = reader.result;
        darkImage.src = reader.result;
        darkImage.style.display = 'block';
    }

    if (input.files && input.files[0]) {
        reader.readAsDataURL(input.files[0]);
    }
}

document.getElementById('basicFormFile').addEventListener('change', previewImage);
");
?>





<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col-sm mb-2 mb-sm-0">
            <h1 class="page-header-title"><?= Html::encode($this->title) ?></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-no-gutter">
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= Url::to(['index']) ?>">Insurances</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= Html::encode($this->title) ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- End Page Header -->

<div class="row">
    <div class="col-lg-11 mb-3 mb-lg-0">
        <!-- Card -->
        <div class="card mb-3 mb-lg-5">
            <div class="card-header">
                <h4 class="card-header-title">Insurance information</h4>
            </div>
            <div class="card-body">


                <?php $form = ActiveForm::begin([
                    'options' => ['enctype' => 'multipart/form-data'] // Important for file uploads
                ]);
                ?>


                <!-- Form -->
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
                            <label for="price" class="form-label">Price</label>



                            <div class="quantity-counter ">
                                <div class="js-quantity-counter row align-items-center">
                                    <div class="col">
                                        <span class="d-block small">Select quantity</span>

                                        <?= $form->field($model, 'price')->textInput(['class' => 'js-result  form-control form-control-quantity-counter', 'value' => '1'])->label(false)->error(false) ?>

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

                            <?php if ($model->hasErrors('price')) : ?>
                                <div class="help-block">
                                    <?= $model->getFirstError('price') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- End Form -->
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-6">
                        <!-- Form -->
                        <div class="mb-4">

                            <label for="Links" class="form-label">Benifit Link</label>

                            <div>
                                <!-- <input type="text" class="form-control" name="weightName" id="Links" placeholder="0.0" aria-label="0.0"> -->

                                <?= $form->field($model, 'benefits_link')->textInput(['class' => 'form-control  p-3'])->label(false) ?>

                            </div>



                            <!-- <small class="form-text">Used to calculate shipping rates at checkout and label prices during fulfillment.</small> -->
                        </div>
                        <!-- End Form -->
                    </div>
                    <!-- End Col -->
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




                <!-- Body -->

                <div class="card-header card-header-content-between">
                    <h4 class="card-header-title">Media</h4>
                    <div class="dropdown">
                        <a class="btn btn-ghost-secondary btn-sm" href="#!" id="mediaDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Add media from URL <i class="bi-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end mt-1">
                            <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#addImageFromURLModal">
                                <i class="bi-link dropdown-item-icon"></i> Add image from URL
                            </a>
                            <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#embedVideoModal">
                                <i class="bi-youtube dropdown-item-icon"></i> Embed video
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dz-dropzone dz-dropzone-card">
                        <div class="dz-message d-flex flex-column align-items-center justify-content-center">

                            <?php
                            $photoUrl = $model->photo ? Url::to('@web/images/' . $model->photo) : Url::to('@web/svg/illustrations/oc-browse.svg');
                            ?>

                            <img id="defaultImage" class="avatar avatar-xl avatar-4x3 mb-3" src="<?= $photoUrl ?>" alt="Image Description" data-hs-theme-appearance="default">

                            <!-- <p class="mb-2 text-center">or</p> -->
                            <?= $form->field($model, 'photo')->fileInput([
                                'class' => 'form-control d-flex justify-center',
                                'style' => 'background-color: #fff; border: .0625rem solid rgba(231, 234, 243, .7); width: 110px;',
                                'id' => 'basicFormFile',
                            ])->label(false) ?>
                        </div>
                    </div>
                </div>


                <div class="form-group d-flex justify-content-end">
                    <?= Html::submitButton('Save', [
                        'class' => 'btn btn-primary',
                        'style' => 'width: 150px;'
                    ]) ?>
                </div>

                <?php ActiveForm::end(); ?>
                <!-- End Card -->
            </div>
        </div>
    </div>

