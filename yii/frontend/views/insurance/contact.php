<?php

/** @var yii\web\View $this */
/** @var \common\models\Policy[] $policies */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;

$this->title = 'Contact us';
?>
<div class="pattern-square"></div>
<section class="pt-10 pb-10 bg-dark text-center">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 col-12">
                <h1 class="mb-3 text-white-stable"><span class="text-warning">Contact</span> us</h1>
                <p class=" mb-4 text-center">The best way to contact us is to use our contact form below.<br> Please fill out all of the required fields and we will get back to you as soon as possible.</p>

            </div>
        </div>
    </div>
</section>






<!-- Contact 1 - Bootstrap Brain Component -->
<section class="mb-xl-9  mt-5">
    <div class="d-flex justify-content-center container">
        <div class="row justify-content-center w-75 ">

            <div class="col-lg-8 col-md-10 col-12 w-75">

                <!-- <hr class="w-50 mx-auto mb-3 mb-xl-8 border-dark-subtle"> -->
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-12 col-lg-9">
                <div class="bg-white border rounded shadow-sm overflow-hidden">
                    <!-- <h2 class="text-center">Contact</h2> -->

                    <?php $form = ActiveForm::begin(['options' => ['class' => 'rounded bg-white shadow p-3']]) ?>

                    <div class="row gy-3 gy-xl-5 p-4 p-xl-5">
                        <div class="col-12 ">
                            <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <!-- <input type="text" class="form-control" id="fullname" name="fullname" value="" required> -->
                            <?= $form->field($model, 'name')->textInput(['class' => 'form-control pb-3', 'id' => 'fullname'])->label(false)  ?>

                        </div>
                        <div class="col-12 col-md-6 mt-1">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>

                            <!-- <input type="email" class="form-control" id="email" name="email" value="" required> -->
                            <?= $form->field($model, 'email')->textInput(['class' => 'form-control pb-3', 'id' => 'email'])->label(false)  ?>


                        </div>
                        <div class="col-12 col-md-6 mt-1">
                            <label for="phone" class="form-label">Phone Number</label>

                            <!-- <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                      <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                    </svg>
                  </span> -->
                            <!-- <input type="tel" class="form-control" id="phone" name="phone" value=""> -->
                            <?= $form->field($model, 'mobile', [
                                'options' => ['class'=>'col-md-12']
                            ])->widget(PhoneInput::class, [
                                'jsOptions' => [
                                    'preferredCountries' => ['jo'],
                                    'class' => 'form-control pb-3',
                                    'id' => 'phone',
                                 
                                ]
                            ])->label(false); ?>


                        </div>
                        <div class="col-12 mt-1">
                            <label for="message" class="form-label">Message <span class="text-danger">*</span></label>

                            <?= $form->field($model, 'message')->textarea([
                                'class' => 'form-control',
                                'rows' => '3',
                            ])->label(false) ?>

                        </div>
                        <div class="col-12 mt-2">
                            <div class="d-grid">
                                <?= Html::submitButton('Send', ['class' => 'btn w-100 btn-primary text-white', 'name' => 'login-button']) ?>

                            </div>
                        </div>
                    </div>

                    <?php ActiveForm::end() ?>


                </div>
            </div>
        </div>
    </div>
</section>