<?php

/** @var yii\web\View $this */

use common\models\Countries;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'My Yii Application';
?>
<!--Hero start-->
<section class="bg-primary-dark pt-9 right-slant-shape" data-cue="fadeIn">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-12">
                <div class="text-center text-lg-start mb-7 mb-lg-0" data-cues="slideInDown">
                    <div class="mb-4">
                        <h1 class="mb-5 display-5 text-white-stable">
                            Claim your travel insurance
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
            </div>
            <div class="offset-lg-1 col-lg-5 col-12">
                <div class="position-relative z-1 pt-lg-9" data-cue="slideInRight">
                    <div class="position-relative">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <?php $form = ActiveForm::begin(['action'=>'/insurance/travel', 'method'=>'get', 'options'=>['class'=>'row needs-validation g-3']]) ?>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h3 class="mb-0 text-center">Get Covered</h3>
                                            <?= $form->field($model, 'type')->hiddenInput(['value'=>1])->label(false) ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="ScheduleFirstnameInput" class="form-label">
                                            From
                                            <span class="text-danger">*</span>
                                        </label>
                                        <?= $form->field($model, 'from_country')->dropDownList(\yii\helpers\ArrayHelper::map(
                                                Countries::find()->cache(27000)->all(), 'code', 'country'
                                        ), ['prompt' => 'Departure'])->label(false) ?>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="scheduleLastnameInput" class="form-label">
                                            To
                                            <span class="text-danger">*</span>
                                        </label>
                                        <?= $form->field($model, 'to_country')->dropDownList(\yii\helpers\ArrayHelper::map(
                                            Countries::find()->cache(27000)->all(), 'code', 'country'
                                        ), ['prompt' => 'Arrival'])->label(false) ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="scheduleEmailInput" class="form-label">
                                            Departure Date
                                            <span class="text-danger">*</span>
                                        </label>
                                        <?= $form->field($model, 'date')->textInput(['type'=>'date'])->label(false) ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="scheduleEmailInput" class="form-label">
                                            Days (Duration)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <?= $form->field($model, 'duration')->dropDownList([
                                            3=>'3 Days',
                                            4=>'4 Days',
                                            5=>'5 Days',
                                            6=>'6 Days',
                                            7=>'7 Days',
                                            8=>'8 Days',
                                            9=>'9 Days',
                                            10=>'10 Days',
                                            11=>'11 Days',
                                            12=>'12 Days',
                                            13=>'13 Days',
                                            14=>'14 Days',
                                            15=>'15 Days',
                                            17=>'17 Days',
                                            18=>'18 Days',
                                            19=>'19 Days',
                                            20=>'20 Days',
                                            21=>'21 Days',
                                            22=>'22 Days',
                                            23=>'23 Days',
                                            24=>'24 Days',
                                            25=>'25 Days',
                                            26=>'26 Days',
                                            27=>'27 Days',
                                            28=>'28 Days',
                                            29=>'29 Days',
                                            30=>'30 Days',
                                            60=>'60 Days',
                                            90=>'90 Days',
                                            180=>'180 Days',
                                            365=>'1 Year',
                                            730=>'2 Years',
                                            1095=>'3 Years',
                                        ], ['class'=>'form-control'])->label(false) ?>

                                    </div>
                                        <div id="adult" class="col">
                                            <label for="scheduleEmailInput" class="form-label">
                                                Adult
                                                <span class="text-danger">*</span>
                                            </label>
                                            <?= $form->field($model, 'adult')->dropDownList([
                                                0=>'0',
                                                1=>'1',
                                                2=>'2',
                                                3=>'3',
                                                4=>'4',
                                                5=>'5',
                                                6=>'6',
                                                7=>'7',
                                                8=>'8',
                                                9=>'9',
                                                10=>'10',
                                                11=>'11',
                                                12=>'12',
                                                13=>'13',
                                                14=>'14',
                                                15=>'15',
                                                17=>'17',
                                                18=>'18',
                                                19=>'19',
                                                20=>'20',
                                                21=>'21',
                                                22=>'22',
                                                23=>'23',
                                                24=>'24',
                                                25=>'25',
                                                26=>'26',
                                                27=>'27',
                                                28=>'28',
                                                29=>'29',
                                                30=>'30',
                                                31=>'31',
                                                32=>'32',
                                                33=>'33',
                                                34=>'34',
                                                35=>'35',
                                                36=>'36',
                                                37=>'37',
                                                38=>'38',
                                                39=>'39',
                                                40=>'40',
                                                41=>'41',
                                                42=>'42',
                                                43=>'43',
                                                44=>'44',
                                                45=>'45',
                                                46=>'46',
                                                47=>'47',
                                                48=>'48',
                                                49=>'49',
                                                50=>'50',
                                            ], ['class'=>'form-control'])->label(false) ?>
                                        </div>
                                        <div id="child" class="col">
                                            <label for="scheduleEmailInput" class="form-label">
                                                Child
                                            </label>
                                            <?= $form->field($model, 'children')->dropDownList([
                                                0=>'0',
                                                1=>'1',
                                                2=>'2',
                                                3=>'3',
                                                4=>'4',
                                                5=>'5',
                                                6=>'6',
                                                7=>'7',
                                                8=>'8',
                                                9=>'9',
                                                10=>'10',
                                            ], ['class'=>'form-control'])->label(false) ?>
                                        </div>
                                        <div id="infant" class="col">
                                            <label for="scheduleEmailInput" class="form-label">
                                                Infant
                                            </label>
                                            <?= $form->field($model, 'infants')->dropDownList([
                                                0=>'0',
                                                1=>'1',
                                                2=>'2',
                                            ], ['class'=>'form-control'])->label(false) ?>
                                        </div>
                                    <div class="col-12">
                                        <p id="adult1-note" class="text-muted small mb-0">Adult age must be between 19-75 years old</p>
                                        <p id="infant-note" class="text-muted small">Infant age must be between 30 days-2 years old</p>

                                    </div>
                                    <div class="d-grid">
                                        <?= Html::submitButton('Next', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>

                                    </div>
                                <?php ActiveForm::end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Hero start-->

<!--Featured in start-->
<div class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-12" data-cue="fadeIn">
                <ul class="list-inline text-center">
                    <li class="list-inline-item d-inline-flex align-items-center me-3 mb-2 mb-lg-0">
                        <img src="/assets/flags/jo.png" class="rounded-circle" width="24" height="24" alt="Jordan" />
                        <h6 class="my-2 ms-2">Jordan</h6>
                    </li>
                    <li class="list-inline-item d-inline-flex align-items-center me-3 mb-2 mb-lg-0">
                        <img src="/assets/flags/kw.png" class="rounded-circle" width="24" height="24" alt="Jordan" />
                        <h6 class="my-2 ms-2">Kuwait</h6>
                    </li>
                    <li class="list-inline-item d-inline-flex align-items-center me-3 mb-2 mb-lg-0">
                        <img src="/assets/flags/lb.png" class="rounded-circle" width="24" height="24" alt="Jordan" />
                        <h6 class="my-2 ms-2">Lebanon</h6>
                    </li>
                    <li class="list-inline-item d-inline-flex align-items-center me-3 mb-2 mb-lg-0">
                        <img src="/assets/flags/ae.png" class="rounded-circle" width="24" height="24" alt="Jordan" />
                        <h6 class="my-2 ms-2">United Arab Emirates</h6>
                    </li>
                    <li class="list-inline-item d-inline-flex align-items-center me-3 mb-2 mb-lg-0">
                        <img src="/assets/flags/sa.png" class="rounded-circle" width="24" height="24" alt="Jordan" />
                        <h6 class="my-2 ms-2">Saudi Arabia</h6>
                    </li>
                    <li class="list-inline-item d-inline-flex align-items-center me-3 mb-2 mb-lg-0">
                        <img src="/assets/flags/qa.png" class="rounded-circle" width="24" height="24" alt="Jordan" />
                        <h6 class="my-2 ms-2">Qatar</h6>
                    </li>
                    <li class="list-inline-item d-inline-flex align-items-center me-3 mb-2 mb-lg-0">
                        <img src="/assets/flags/iq.png" class="rounded-circle" width="24" height="24" alt="Jordan" />
                        <h6 class="my-2 ms-2">Iraq</h6>
                    </li>
                    <li class="list-inline-item d-inline-flex align-items-center me-3 mb-2 mb-lg-0">
                        <img src="/assets/flags/bh.png" class="rounded-circle" width="24" height="24" alt="Jordan" />
                        <h6 class="my-2 ms-2">Bahrain</h6>
                    </li>

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
                    <div class="swiper-wrapper pb-7" id="swiper-wrapper-3ec847c46421dd89" aria-live="off">
                        <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 5" data-swiper-slide-index="0" style="width: 172.2px; margin-right: 50px;">
                            <div data-cue="slideInDown" data-show="true" style="animation-name: slideInDown; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 200ms; animation-direction: normal; animation-fill-mode: both;">
                                <figure class="text-center">
                                    <img src="/images/gig.png" alt="logo" width="110">
                                </figure>
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 5" data-swiper-slide-index="1" style="width: 172.2px; margin-right: 50px;">
                            <div data-cue="slideInDown" data-show="true" style="animation-name: slideInDown; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 400ms; animation-direction: normal; animation-fill-mode: both;">
                                <figure class="text-center">
                                    <img src="/images/qic.png" alt="logo" width="150">
                                </figure>
                            </div>
                        </div>
                        <div class="swiper-slide" role="group" aria-label="3 / 5" data-swiper-slide-index="2" style="width: 172.2px; margin-right: 50px;">
                            <div data-cue="slideInDown" data-show="true" style="animation-name: slideInDown; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 600ms; animation-direction: normal; animation-fill-mode: both;">
                                <figure class="text-center">
                                    <img src="/images/jordan.png" alt="logo" width="160">

                                </figure>
                            </div>
                        </div>
                        <div class="swiper-slide" role="group" aria-label="4 / 5" data-swiper-slide-index="3" style="width: 172.2px; margin-right: 50px;">
                            <div data-cue="slideInDown" data-show="true" style="animation-name: slideInDown; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 800ms; animation-direction: normal; animation-fill-mode: both;">
                                <figure class="text-center">
                                    <img src="/images/iraq.png" alt="logo" width="190">
                                </figure>
                            </div>
                        </div>
                        <div class="swiper-slide" role="group" aria-label="5 / 5" data-swiper-slide-index="4" style="width: 172.2px; margin-right: 50px;">
                            <div data-cue="slideInDown" data-show="true" style="animation-name: slideInDown; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 1000ms; animation-direction: normal; animation-fill-mode: both;">
                                <figure class="text-center">
                                    <img src="/images/kuwait.png" alt="logo" width="120">
                                </figure>
                            </div>
                        </div>
                        <div class="swiper-slide" role="group" aria-label="6 / 5" data-swiper-slide-index="4" style="width: 172.2px; margin-right: 50px;">
                            <div data-cue="slideInDown" data-show="true" style="animation-name: slideInDown; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 1000ms; animation-direction: normal; animation-fill-mode: both;">
                                <figure class="text-center">
                                    <img src="/images/tune.png" alt="logo" width="70">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination swiper-pagination-bullets swiper-pagination-horizontal swiper-pagination-bullets-dynamic swiper-pagination-lock" style="width: 90px;"><span class="swiper-pagination-bullet swiper-pagination-bullet-active swiper-pagination-bullet-active-main" aria-current="true" style="left: 36px;"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active-next" style="left: 36px;"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active-next-next" style="left: 36px;"></span><span class="swiper-pagination-bullet" style="left: 36px;"></span><span class="swiper-pagination-bullet" style="left: 36px;"></span></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
            </div>
        </div>
    </div>
</div>
<!--Card-->
<section class="my-xl-9 my-5">
    <div class="container" data-cue="fadeIn">
        <div class="row">
            <div class="col-md-4 mt-3">
                <!--Image overlay-->
                <a href="#" class="card text-bg-light shadow"  data-cue="fadeUp">
                    <img src="/images/travel.jpg" class="card-img" alt="img">
                    <div class="card-img-overlay text-white d-inline-flex justify-content-start align-items-end overlay-dark">
                        <div class="text-capitalize">
                            <h2 class="card-title">Travel Insurance</h2>
                            <div class="mb-4 justify-content-center">
                                <div class="price-text">
                                    <span class="small">starts from </span>
                                    <div class="price price-show h1 text-warning">
                                        <span>$</span>
                                        <span>3.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-3">
                <!--Image overlay-->
                <a href="#" class="card text-bg-light shadow"  data-cue="fadeUp">
                    <img src="/images/student.jpg" class="card-img" alt="img">
                    <div class="card-img-overlay text-white d-inline-flex justify-content-start align-items-end overlay-dark">
                        <div class="text-capitalize">
                            <h2 class="card-title">Student Insurance</h2>
                            <div class="mb-4 justify-content-center">
                                <div class="price-text">
                                    <span class="small">starts from </span>
                                    <div class="price price-show h1 text-warning">
                                        <span>$</span>
                                        <span>99</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-3">
                <!--Image overlay-->
                <a href="#" class="card text-bg-light shadow"  data-cue="fadeUp">
                    <img src="/images/bag.jpg" class="card-img" alt="img">
                    <div class="card-img-overlay text-white d-inline-flex justify-content-start align-items-end overlay-dark">
                        <div class="text-capitalize">
                            <h2 class="card-title">Luggage Insurance</h2>
                            <div class="mb-4 justify-content-center">
                                <div class="price-text">
                                    <span class="small">starts from </span>
                                    <div class="price price-show h1 text-warning">
                                        <span>$</span>
                                        <span>0.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
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

<!--Get block card start-->
<section class="my-xl-7 py-5">
    <div class="container" data-cue="fadeIn">
        <div class="row">
            <div class="col-md-12" data-cue="fadeIn">
                <div class="mb-xl-7 mb-5 text-center">
                    <h2 class="mb-3">
                        How to Obtain Travel Insurance in 3 Easy Steps
                    </h2>
                    <p class="mb-0">Secure your journey in three easy steps: compare plans, choose coverage, and buy </p>
                </div>
            </div>
        </div>
        <div class="table-responsive-xl">
            <div class="row flex-nowrap pb-4 pb-lg-0 me-5 me-lg-0">
                <div class="col-lg-4 col-md-6 col-12" data-cue="slideInLeft">
                    <div class="p-xl-5">
                        <div class="d-flex align-items-center justify-content-between mb-5">
                            <div class="icon-xl icon-shape rounded-circle bg-warning border border-warning-subtle border-4 text-dark fw-semibold fs-3">1</div>
                            <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-right text-body-tertiary" viewBox="0 0 24 24">
                                    <path
                                        fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                 </svg>
                              </span>
                        </div>

                        <h3 class="h4">Compare Plans</h3>
                        <p class="mb-0">Evaluate different travel insurance options to find the most suitable coverage for your trip.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12" data-cue="slideInLeft">
                    <div class="p-xl-5">
                        <div class="d-flex align-items-center justify-content-between mb-5">
                            <div class="icon-xl icon-shape rounded-circle bg-warning border border-warning-subtle border-4 text-dark fw-semibold fs-3">2</div>
                            <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-right text-body-tertiary" viewBox="0 0 24 24">
                                    <path
                                        fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                 </svg>
                              </span>
                        </div>

                        <h3 class="h4">Choose Coverage</h3>
                        <p class="mb-0">Select the specific protections you need, such as medical, trip cancellation, or baggage insurance.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12" data-cue="slideInLeft">
                    <div class="p-xl-5">
                        <div class="d-flex align-items-center justify-content-between mb-5">
                            <div class="icon-xl icon-shape rounded-circle bg-warning border border-warning-subtle border-4 text-dark fw-semibold fs-3">3</div>

                        </div>

                        <h3 class="h4">Purchase Insurance</h3>
                        <p class="mb-0">Finalize your insurance purchase online or through a provider to ensure worry-free travels.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Get block card end-->

<!--Call to action start-->
<section>
    <div style="background-image: url(/images/pattern/cta-pattern.png); background-position: center; background-repeat: no-repeat; background-size: cover" class="py-7 bg-primary-dark">
        <div class="container my-lg-7" data-cue="zoomIn">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="text-center mb-5">
                        <h2 class="text-white-stable mb-3">Get your travel insurance online now</h2>
                        <p class="mb-0 text-white-50">
                            Ready to travel with peace of mind? Get your travel insurance online now and embark on your next adventure worry-free!
                        </p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="text-center">
                        <a href="#!" class="btn btn-primary">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
