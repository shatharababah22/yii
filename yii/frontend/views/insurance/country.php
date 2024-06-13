<?php

/** @var yii\web\View $this */
/** @var \frontend\models\InquiryForm $model */

use common\models\Countries;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = 'About';
?>
<!--hero start-->
<section class="jarallax py-9 hero-agency" data-jarallax data-speed="0.4">
    <img class="jarallax-img" src="/images/jo1.jpg" alt="agency" />
    <div class="position-absolute start-0 end-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-12" data-cue="zoomIn">
                    <div class="text-center text-lg-start">
                        <div class="mb-4 text-white-stable">
                            <small class="text-uppercase ls-lg">Immediate Travel Coverage</small>
                            <h1 class="mb-3 mt-3 display-4 text-white text-shadow-1">
                                Get Instant Travel Insurance in Jordan
                            </h1>
                            <p class="lead mb-0 text-white">
                                Planning a trip to or from Jordan? Get your travel insurance instantly for worry-free travel experiences.
                            </p>
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
                                        <?php $model->from_country = "JO"; ?>
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
<section class="my-xl-9 my-5">
    <div class="container" data-cue="fadeIn">
        <div class="row">
            <?php foreach (\common\models\Insurances::find()->all() as $insurance): ?>
            <div class="col-md-4 mt-5">
                <!--Image overlay-->
                <a href="#" class="card text-bg-light shadow"  data-cue="fadeUp">
                    <img src="<?= $insurance->photo ?>" class="card-img" alt="img">
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
                    <?php foreach(\common\models\InsuranceCountries::find()->all() as $company): ?>
                    <div class="col-xl-4 col-6 col-md-4" data-cue="zoomIn">
                        <div class="card card-lift text-center py-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="<?= $company->company_logo ?>" alt="company" style="max-width: 150px;height: 80px;" />
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
