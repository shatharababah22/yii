<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\Customers $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Contact';
?>
<div class="pattern-square"></div>
<!--Pageheader start-->
<section class="pt-10 pb-10 bg-dark text-center">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 col-12">
                <h1 class="mb-3 text-white-stable"><span class="text-warning">Check</span> Your Policy</h1>
            </div>
        </div>
    </div>
</section>

<section class="mb-xl-9 my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <div class="policy-form">

                            <?php $form = ActiveForm::begin(); ?>

                            <?= $form->field($model, 'country_code')->textInput(['maxlength' => true, 'placeholder' => '+962']) ?>

                            <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

                            <div class="form-group">
                                <?= Html::submitButton('Send OTP', ['class' => 'btn btn-primary']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>