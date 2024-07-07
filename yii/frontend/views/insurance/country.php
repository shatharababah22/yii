<?php

/** @var yii\web\View $this */
/** @var \frontend\models\InquiryForm $model */

use common\models\Countries;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$insurance_name = ($insurance !== null) ? htmlspecialchars($insurance->name, ENT_QUOTES, 'UTF-8') : $country->insurance->name;
$this->registerJsFile('https://code.jquery.com/jquery-3.6.0.min.js');

$this->title = 'About';
?>
<!--hero start-->
<section class="bg-primary-dark pt-9 right-slant-shape" data-cue="fadeIn">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-12">
                <div class="text-center text-lg-start mb-7 mb-lg-0" data-cues="slideInDown">
                    <div class="mb-4">
                        <h1 class="mb-5 display-5 text-white-stable">
                            Claim your <?= $insurance_name  ?> insurance
                            <span class="text-pattern-line text-warning"> within minutes</span>
                        </h1>
                        <p class="mb-0 text-white-50">
                            Worldwide & Schengen – Accepted by all Embassies. All our insurance covers COVID-19 100%.
                        </p>
                    </div>
                    <div data-cues="slideInDown">
                        <a href="#" class="btn btn-primary me-2">Get Covered Now</a>
                        <a href="#" class="btn btn-outline-warning">Explore Programs</a>
                    </div>

                </div>
                <?php if ($country !== null) : ?>
                    <div class="country-details">
                        <img src="<?= Yii::$app->request->baseUrl ?>/dashboard/images/<?= $country->company_logo ?>" alt="logo" width="120" class="mt-4">

                    </div>
                <?php endif; ?>
            </div>
            <div class="offset-lg-1 col-lg-5 col-12">
                <div class="position-relative z-1 pt-lg-9" data-cue="slideInRight">
                    <div class="position-relative">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <?php $form = ActiveForm::begin(['action' => '/insurance/travel', 'method' => 'get', 'options' => ['class' => 'row needs-validation g-3']]) ?>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h3 class="mb-0 text-center">Get Covered</h3>
                                        <?= $form->field($model, 'type')->hiddenInput(['value' => 1])->label(false) ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="ScheduleFirstnameInput" class="form-label">
                                        From
                                        <span class="text-danger">*</span>
                                    </label>
                                    <?= $form->field($model, 'from_country')->dropDownList(\yii\helpers\ArrayHelper::map(
                                        Countries::find()->all(),
                                        'code',
                                        'country'
                                    ), ['prompt' => 'Departure'])->label(false) ?>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="scheduleLastnameInput" class="form-label">
                                        To
                                        <span class="text-danger">*</span>
                                    </label>
                                    <?= $form->field($model, 'to_country')->dropDownList(\yii\helpers\ArrayHelper::map(
                                        Countries::find()->all(),
                                        'code',
                                        'country'
                                    ), ['prompt' => 'Arrival'])->label(false) ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="scheduleEmailInput" class="form-label">
                                        Departure Date
                                        <span class="text-danger">*</span>
                                    </label>
                                    <?= $form->field($model, 'date')->textInput(['type' => 'date', 'min' => date('Y-m-d'), 'onclick' => '$(this).focus();'])->label(false) ?>
                                    </div>
                                <div class="col-md-6">
                                    <label for="scheduleEmailInput" class="form-label">
                                        Days (Duration)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <?= $form->field($model, 'duration')->dropDownList([
                                        '7' => '7 days',
                                        '10' => '10 days',
                                        '15' => '15 days',
                                        '21' => '21 days',
                                        '30' => '1 month',
                                        '60' => '2 months',
                                        '90' => '3 months',
                                        '180' => '6 months',
                                        '365' => '1 year',
                                        '730' => '2 years',
                                        '1095' => '3 years',
                                    ], ['prompt' => 'Duration', 'class' => 'form-control'])->label(false) ?>
                                </div>
                                <div id="adult" class="col">
                                    <label for="scheduleEmailInput" class="form-label">
                                        Adult
                                        <span class="text-danger">*</span>
                                    </label>
                                    <?= $form->field($model, 'adult')->dropDownList(range(0, 50), ['class' => 'form-control'])->label(false) ?>
                                </div>
                                <div id="child" class="col">
                                    <label for="scheduleEmailInput" class="form-label">
                                        Child
                                    </label>
                                    <?= $form->field($model, 'children')->dropDownList(range(0, 10), ['class' => 'form-control'])->label(false) ?>
                                </div>
                                <div id="infant" class="col">
                                    <label for="scheduleEmailInput" class="form-label">
                                        Infant
                                    </label>
                                    <?= $form->field($model, 'infants')->dropDownList(range(0, 2), ['class' => 'form-control'])->label(false) ?>
                                </div>
                                <div class="col-12">
                                    <p id="adult1-note" class="text-muted small mb-0">Adult age must be between 19-75 years old</p>
                                    <p id="infant-note" class="text-muted small">Infant age must be between 30 days-2 years old</p>
                                </div>
                                <div class="d-grid">
                                    <?= Html::submitButton('Next', ['class' => 'btn btn-warning', 'name' => 'login-button']) ?>
                                </div>
                                <?php ActiveForm::end() ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!--hero end-->

<!--Featured in start-->
<div class="my-5">
<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-12" data-cue="fadeIn">
            <ul class="list-inline text-center">
                <?php foreach (\common\models\Countries::find()->all() as $country) : ?>
                    <li class="list-inline-item d-inline-flex align-items-center me-3 mb-2 mb-lg-0">
                        <?php if (!empty($country->code)): ?>
                            <img src="/assets/flags/<?= $country->code ?>.png" class="rounded-circle" width="24" height="24" alt="<?= $country->country ?>" />
                        <?php else: ?>
                            <div class="flag-placeholder rounded-circle"></div>
                        <?php endif; ?>
                        <h6 class="my-2 ms-2"><?= $country->country ?></h6>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

</div>
<!--Featured in end-->


<div class="my-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-12" data-cue="fadeIn" data-show="true" style="animation-name: fadeIn; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                <div class="text-center mb-4 mb-lg-7">
                    <small class="text-uppercase fw-semibold ls-md">Certified insurance companies</small>
                </div>


                <div class="swiper logoSwiper swiper-initialized swiper-horizontal swiper-backface-hidden" data-cue="slideInDown" data-show="true" style="animation-name: slideInDown; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                    <?php foreach (\common\models\InsuranceCountries::find()->all() as $Countries) : ?>

                        <div class="swiper-wrapper pb-7" id="swiper-wrapper-3ec847c46421dd89" aria-live="off">
                            <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 5" data-swiper-slide-index="0" style="width: 172.2px; margin-right: 50px;">
                                <div data-cue="slideInDown" data-show="true" style="animation-name: slideInDown; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 200ms; animation-direction: normal; animation-fill-mode: both;">
                                    <figure class="text-center">
                                        <img src="<?= Yii::$app->request->baseUrl ?>/dashboard/images/<?= $Countries->company_logo ?>" alt="logo" width="110">
                                    </figure>
                                </div>
                            </div>

                        <?php endforeach; ?>



                        </div>
                        <div class="swiper-pagination swiper-pagination-bullets swiper-pagination-horizontal swiper-pagination-bullets-dynamic swiper-pagination-lock" style="width: 90px;"><span class="swiper-pagination-bullet swiper-pagination-bullet-active swiper-pagination-bullet-active-main" aria-current="true" style="left: 36px;"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active-next" style="left: 36px;"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active-next-next" style="left: 36px;"></span><span class="swiper-pagination-bullet" style="left: 36px;"></span><span class="swiper-pagination-bullet" style="left: 36px;"></span></div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="my-xl-9 my-5">
    <div class="container" data-cue="fadeIn">
        <div class="row">
            <?php foreach (\common\models\Insurances::find()->all() as $insurance) : ?>
                <div class="col-md-4 mt-5">

                    <a href="<?= Url::to(['/insurance/type', 'slug' => $insurance->slug]) ?>" class="card text-bg-light shadow" data-cue="fadeUp">
                        <img src="<?= Yii::$app->request->baseUrl ?>/dashboard/images/<?= $insurance->photo ?>" class="card-img" alt="img">
                        <div class="card-img-overlay text-white d-inline-flex justify-content-start align-items-end overlay-dark">
                            <div class="text-capitalize">
                                <h2 class="card-title"><?= $insurance->name ?></h2>
                                <div class="mb-4 justify-content-center">
                                    <div class="price-text">
                                        <span class="small">starts from </span>
                                        <div class="price price-show h1 text-warning">
                                            <span>$</span>
                                            <span><?= $insurance->price ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!--5m member start-->
<section class="pt-xl-9 py-5 bg-primary-dark">
    <div class="container" data-cue="fadeIn">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-12">
                <div class="text-center mb-xl-7 mb-5">
                    <h2 class="text-white-stable mb-3">Explore with Confidence: <span class="text-warning">Travel Insurance</span></h2>
                    <p class="mb-0 text-white-50">
                        Ensure worry-free adventures with our comprehensive travel insurance plans. Whether you're embarking on a family vacation, solo expedition, or business trip, we've got you covered with protection against unexpected mishaps and emergencies.
                    </p>
                </div>
            </div>
        </div>
        <div class="row mb-7 pb-4 g-5 text-center text-lg-start">
            <div class="col-md-4" data-cue="fadeIn">
                <img src="/images/4066885_building_company_coverage_insurance_office_icon.png" width="80" />
                <h4 class="text-white-stable">Medical Assistance</h4>
                <p class="text-white-50 mb-3">Stay protected against unforeseen medical emergencies while traveling.</p>
                <ul class="text-white-50">
                    <li>Medical Expenses Coverage</li>
                    <li>Emergency Medical Evacuation</li>
                    <li>24/7 Medical Assistance</li>
                </ul>
            </div>
            <div class="col-md-4" data-cue="fadeIn">
                <img src="/images/4066893_coverage_insurance_liability_protect_travel_icon.png" width="80" />
                <h4 class="text-white-stable">Trip Protection</h4>
                <p class="text-white-50 mb-3">Safeguard your investment with coverage for trip cancellations and interruptions.</p>
                <ul class="text-white-50">
                    <li>Trip Cancellation & Interruption Insurance</li>
                    <li>Travel Delay Reimbursement</li>
                    <li>Baggage Delay/Loss Coverage</li>
                </ul>
            </div>
            <div class="col-md-4" data-cue="fadeIn">
                <img src="/images/4066902_coverage_insurance_liability_professional_protection_icon.png" width="80" />
                <h4 class="text-white-stable">Enhanced Coverage</h4>
                <p class="text-white-50 mb-3">Elevate your travel experience with added protection and convenience.</p>
                <ul class="text-white-50">
                    <li>Cancel for Any Reason (CFAR) Coverage</li>
                    <li>Enhanced Baggage Protection</li>
                    <li>Personal Liability Coverage</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--5m member end-->


<!--Testimonial start-->
<section class="py-xl-9 py-5">
    <div class="container">
        <div class="row gy-7 gx-lg-7">
            <div class="col-lg-6 col-12" data-cue="fadeIn">
                <div class="d-flex flex-column gap-3 mb-6">
                    <div>
                        <h2>Certified insurance companies</h2>
                        <p class="lead lh-lg mt-5">
                            Explore our curated selection of certified insurance companies, trusted providers offering comprehensive coverage for your peace of mind. Rest assured with top-notch service and reliable protection for your travel needs.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12" data-cue="fadeIn">
                <div class="row g-4">
                    <?php foreach (\common\models\InsuranceCountries::find()->all() as $company) : ?>
                        <div class="col-xl-4 col-6 col-md-4" data-cue="zoomIn">
                            <div class="card card-lift text-center py-3">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="<?= Yii::$app->request->baseUrl ?>/dashboard/images/<?= $insurance->photo ?>"" alt=" company" style="max-width: 150px;height: 80px;" />
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Testimonial end-->