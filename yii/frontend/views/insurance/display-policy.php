<?php

/** @var yii\web\View $this */
/** @var \common\models\Policy[] $policies */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Your Policy';
?>
<div class="pattern-square"></div>
<section class="pt-10 pb-10 bg-dark text-center">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 col-12">
                <h1 class="mb-3 text-white-stable"><span class="text-warning">Your</span> Policy</h1>
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
                        <?php if (!empty($policies)): ?>
                            <ul>
                                <?php foreach ($policies as $policy): ?>
                                    <li>
                                        <strong>Policy No:</strong> <?= Html::encode($policy->PolicyNo) ?><br>
                                        <strong>Policy URL:</strong> <?= Html::a(Html::encode($policy->PolicyURLLink), Url::to($policy->PolicyURLLink, true), ['target' => '_blank']) ?><br>
                                        <strong>Departure Date:</strong> <?= date('Y-m-d', $policy->departure_date) ?><br>
                                        <strong>Return Date:</strong> <?= date('Y-m-d', $policy->return_date) ?><br>
                                        <strong>From Airport:</strong> <?= Html::encode($policy->from_airport) ?><br>
                                        <strong>Going To:</strong> <?= Html::encode($policy->going_to) ?><br>
                                        <strong>Status:</strong> <?= Html::encode($policy->status) ?><br>
                                        <strong>Status Description:</strong> <?= Html::encode($policy->status_description) ?><br>
                                        <strong>Price:</strong> <?= Html::encode($policy->price) ?><br>
                                        <hr>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p>No policies found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
