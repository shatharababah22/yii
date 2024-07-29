<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\PolicyDraft $policy */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Review Your Insurance Details';
?>
<div class="pattern-square"></div>
<!--Pageheader start-->
<section class="pt-10 pb-10 bg-dark text-center">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 col-12">
                <h1 class="mb-3 text-white-stable"><span class="text-warning">Review</span>  Details - New Insurance</h1>
            </div>
        </div>
    </div>
</section>
<!--Pageheader end-->
<!--Contact us start-->
<section class="mb-xl-9 my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                <div class="row g-xl-7 gy-5">
                    <div class="col-md-12 col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>Insurance Type</td>
                                            <td><strong><?= $policy->insurance->name ?></strong></td>
                                            <td>Plan</td>
                                            <td><strong><?= $policy->plan->name ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Departing from</td>
                                            <td><strong><?= $policy->DepartCountryCode ?> (<?= $policy->from_airport ?>)</strong></td>
                                            <td>Going To</td>
                                            <td><strong><?= $policy->ArrivalCountryCode ?> (<?= $policy->going_to ?>)</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Date</td>
                                            <td><strong><?=$policy->departure_date ?></strong></td>
                                            <td>Return Date</td>
                                            <td><strong><?=  $policy->return_date ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">Passengers</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>NO</th>
                                                        <th>Name</th>
                                                        <th>Gender</th>
                                                        <th>Nationality</th>
                                                        <th>DOB</th>
                                                        <th>Country</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($policy->policyDraftPassengers as $index => $passenger): ?>
                                                    <tr>
                                                        <td><?= $index+1 ?></td>
                                                        <td><?= $passenger->id_number ?></td>
                                                        <td><?= $passenger->first_name . ' ' . $passenger->middle_name . ' ' . $passenger->last_name ?></td>
                                                        <td><?= $passenger->gender ?></td>
                                                        <td><?= $passenger->nationality ?></td>
                                                        <td><?=  $passenger->dob ?></td>
                                                        <td><?= $passenger->country ?></td>
                                                        <td>
                                                          
                                                            <?= Html::a('Retake', ['/insurance/retake', 'id' => $passenger->id,'policyId'=>$policy->id]) ?>

                                                            
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-start">Due Amount: <strong class="text-success">USD $<?= $policy->price ?></strong></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="mt-2">
                                <?= Html::a('Pay Now', ['/insurance/payment', 'id' => $policy->id], ['class' => 'btn btn-warning w-100']) ?>
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
