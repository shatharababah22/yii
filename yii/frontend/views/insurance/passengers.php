<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use borales\extensions\phoneInput\PhoneInput;
use common\widgets\Alert;


/** @var \common\models\PolicyDraft $policy */

$this->title = 'Contact';
?>
<div class="pattern-square"></div>
<!--Pageheader start-->
<section class="pt-10 pb-10 bg-dark text-center">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 col-12">
                <h1 class="mb-3 text-white-stable"><span class="text-warning">Trip</span> Information - New Insurance</h1>
            </div>
        </div>
    </div>
</section>
<!--Pageheader end-->


<!--Contact us start-->
<section class="mb-xl-9 my-5">

    <div class="container mt-1">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
            <?= Alert::widget() ?>
                <div class="row g-xl-7 gy-5">
                    <div class="col-md-7 col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'class' => 'row needs-validation g-3']]) ?>
                                <div class="col-md-6">
                                    <?= $form->field($policy, 'from_airport')->dropDownList(
                                        \yii\helpers\ArrayHelper::map(
                                            \common\models\Airports::find()
                                                ->leftJoin('countries', 'countries.id = airports.country_id')
                                                ->where(['countries.code' => $policy->DepartCountryCode])
                                                
                                                ->all(),
                                            'code',
                                            'name'
                                        )
                                    ) ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($policy, 'going_to')->dropDownList(
                                        \yii\helpers\ArrayHelper::map(
                                            \common\models\Airports::find()
                                                ->leftJoin('countries', 'countries.id = airports.country_id')
                                                ->where(['countries.code' => $policy->ArrivalCountryCode])
                                             
                                                ->all(),
                                            'code',
                                            'name'
                                        )
                                    ) ?>
                                </div>

                                <p>Upload all passengers passports separated</p>
                                <?php foreach ($model->attributes() as $input) : ?>
                                    <div class="col-md-12">
                                        <?= $form->field($model, $input)->fileInput() ?>
                                    </div>
                                <?php endforeach; ?>
                                <div class="col-md-6">
                                    <?= $form->field($policy, 'email')->textInput() ?>
                                </div>
                                <div class="col-md-6">
                                <?= $form->field($policy, 'mobile')->widget(PhoneInput::class, [
                                            'jsOptions' => [
                                                'preferredCountries' => ['jo'],
                                                'class' => '',
                                            ]
                                        ]); ?>
                                </div>
                                <div class="d-grid">
                                    <?= Html::submitButton('Review', ['class' => 'btn w-100 btn-primary text-white', 'name' => 'login-button']) ?>
                                </div>
                                <?php ActiveForm::end() ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span>Departure: </span>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <span class="fw-bold"><?= $policy->DepartCountryCode  ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span>Arrival: </span>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <span class="fw-bold"><?= $policy->ArrivalCountryCode  ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span>Date: </span>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <span class="fw-bold"><?=  $policy->departure_date  ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span>Return Date: </span>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <span class="fw-bold"><?=  $policy->return_date  ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span>Passengers: </span>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <span class="fw-bold"><?= ($policy->adult + $policy->children + $policy->infant)  ?></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-grid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span>Total: </span>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <span class="fw-bold text-success"><?= $policy->price ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!--Contact us end-->