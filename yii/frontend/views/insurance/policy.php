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
                        <?php $form = ActiveForm::begin(['action' => ['insurance/check'], 'options' => ['class' => 'row g-3']]) ?>
                        <div class="col-md-12">
                            <?= $form->field($model, 'mobile')->textInput() ?>
                        </div>
                        <div class="col-md-12 d-flex justify-content-end">
                            <?= Html::submitButton('Review', ['class' => 'btn btn-primary w-50 text-white']) ?>
                        </div>
                        <?php ActiveForm::end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
