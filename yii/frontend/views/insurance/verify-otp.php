<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \yii\base\DynamicModel $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Verify OTP';
?>
<div class="pattern-square"></div>
<section class="pt-10 pb-10 bg-dark text-center">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 col-12">
                <h1 class="mb-3 text-white-stable"><span class="text-warning">Verify</span> Your OTP</h1>
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
                        <?php if (Yii::$app->session->hasFlash('error')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= Yii::$app->session->getFlash('error') ?>
                            </div>
                        <?php endif; ?>

                        <?php $form = ActiveForm::begin(['options' => ['class' => 'row g-3']]) ?>
    <div class="col-md-12">
        <?= $form->field($model, 'otp')->textInput(['name' => 'DynamicModel[otp]']) ?>
    </div>
    <div class="col-md-12 d-flex justify-content-end">
        <?= Html::submitButton('Verify', ['class' => 'btn btn-primary w-50 text-white']) ?>
    </div>
<?php ActiveForm::end() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
