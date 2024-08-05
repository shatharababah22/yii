<?php

/** @var yii\web\View $this */
/** @var \frontend\models\InquiryForm $model */

use common\models\Countries;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = $insurance->name;





$flashMessage = Yii::$app->session->getFlash('error');
if ($flashMessage) {
    $this->registerJs("
        $(document).ready(function() {
            $('#flashMessageContent').text('{$flashMessage}');
            $('#flashMessageModal').modal('show');
        });
    ");
}


?>      <style>.footer-color {
    background: #2DAE87;
}

.footer-btn {
    background: #415762;
}

/* .check-container {
    background: white;
    height: 82px;
    width: 82px;
}

.iconheight {
    height: 36px;
    width: 36px;
} */



.angle::after {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    top: -1px;
    left: 48%;
    background: #fff;
    clip-path: polygon(50% 50%, 0 0, 100% 0);
}
</style>


<!--hero start-->
<section class="bg-primary-dark pt-9 right-slant-shape" data-cue="fadeIn">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-12">
                <div class="text-center text-lg-start mb-7 mb-lg-0 mt-3" data-cues="slideInDown">
                    <div class="mb-4">

                        <small class="text-uppercase ls-lg">Immediate Insurance Coverage</small>
                        <h1 class="mb-5 display-5 text-white-stable">
                            Get Instant
                            <span class="text-warning"><?= $insurance->name ?></span>
                        </h1>
                        <p class="mb-0 text-white-stable lead">
                            <?= $insurance->overview ?>
                        </p>
                    </div>
                    <div data-cues="slideInDown">
                        <a href="#booking" class="btn btn-primary me-2">Get Started</a>
                        <a href="#" class="btn btn-outline-warning">Contact Sales</a>
                    </div>
                </div>
            </div>
            <div class="offset-lg-1 col-lg-5 col-12">
                <div class="position-relative z-1 pt-lg-9" data-cue="slideInRight">
                    <div class="position-relative">
                        <img src="<?= Yii::$app->request->baseUrl ?>/dashboard/images/<?= $insurance->photo ?>" alt="video" class="img-fluid rounded-3" width="837" />

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="" id="booking">
    <div class="container position-relative z-1 py-xl-9 py-6">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="row align-items-center g-5">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <?php $form = ActiveForm::begin(['action' => '/asurance/travel', 'method' => 'get', 'options' => ['class' => 'row needs-validation g-3']]) ?>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h3 class="mb-0 text-center">Get Now Travel Insurance</h3>
                                    <?= $form->field($model, 'type')->hiddenInput(['value' => $insurance->id])->label(false) ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="ScheduleFirstnameInput" class="form-label">
                                    From
                                    <span class="text-danger">*</span>
                                </label>
                                <!-- <?php $model->from_country; ?> -->
                                <?= $form->field($model, 'from_country')->dropDownList(\yii\helpers\ArrayHelper::map(
                                    Countries::find()->cache(27000)->all(),
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
                                    Countries::find()->cache(27000)->all(),
                                    'code',
                                    'country'
                                ), ['prompt' => 'Arrival'])->label(false) ?>
                            </div>
                            <div class="col-md-6">
                                <label for="scheduleEmailInput" class="form-label">
                                    Departure Date
                                    <span class="text-danger">*</span>
                                </label>
                                <?= $form->field($model, 'date')->textInput([
            'type' => 'date',
            'class' => 'js-flatpickr form-control',
            'placeholder' => 'Select date'
        ])->label(false) ?>                            </div>
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
                                ], ['class' => 'form-control', 'prompt' => 'Duration'])->label(false) ?>

                            </div>
                            <div id="adult" class="col">
                                <label for="scheduleEmailInput" class="form-label">
                                    Adult
                                    <span class="text-danger">*</span>
                                </label>
                                <?= $form->field($model, 'adult')->dropDownList([
                                    0 => '0',
                                    1 => '1',
                                    2 => '2',
                                    3 => '3',
                                    4 => '4',
                                    5 => '5',
                                    6 => '6',
                                    7 => '7',
                                    8 => '8',
                                    9 => '9',
                                    10 => '10',
                                    11 => '11',
                                    12 => '12',
                                    13 => '13',
                                    14 => '14',
                                    15 => '15',
                                    17 => '17',
                                    18 => '18',
                                    19 => '19',
                                    20 => '20',
                                    21 => '21',
                                    22 => '22',
                                    23 => '23',
                                    24 => '24',
                                    25 => '25',
                                    26 => '26',
                                    27 => '27',
                                    28 => '28',
                                    29 => '29',
                                    30 => '30',
                                    31 => '31',
                                    32 => '32',
                                    33 => '33',
                                    34 => '34',
                                    35 => '35',
                                    36 => '36',
                                    37 => '37',
                                    38 => '38',
                                    39 => '39',
                                    40 => '40',
                                    41 => '41',
                                    42 => '42',
                                    43 => '43',
                                    44 => '44',
                                    45 => '45',
                                    46 => '46',
                                    47 => '47',
                                    48 => '48',
                                    49 => '49',
                                    50 => '50',
                                ], ['class' => 'form-control'])->label(false) ?>
                            </div>
                            <div id="child" class="col">
                                <label for="scheduleEmailInput" class="form-label">
                                    Child
                                </label>
                                <?= $form->field($model, 'children')->dropDownList([
                                    0 => '0',
                                    1 => '1',
                                    2 => '2',
                                    3 => '3',
                                    4 => '4',
                                    5 => '5',
                                    6 => '6',
                                    7 => '7',
                                    8 => '8',
                                    9 => '9',
                                    10 => '10',
                                ], ['class' => 'form-control'])->label(false) ?>
                            </div>
                            <div id="infant" class="col">
                                <label for="scheduleEmailInput" class="form-label">
                                    Infant
                                </label>
                                <?= $form->field($model, 'infants')->dropDownList([
                                    0 => '0',
                                    1 => '1',
                                    2 => '2',
                                ], ['class' => 'form-control'])->label(false) ?>
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
</section>

<!--Testimonial start-->
<section class=" py-4 mb-5">



<div class="row mb-4">
            <div class="col-md-12" data-cue="fadeIn">
                <div class="mb-xl-7 mb-4 text-center">
                    <h2 class="mb-2">Certified insurance companies</h2>
                    <p class="mb-0">Explore our curated selection of certified insurance companies,.</p>
                </div>
            </div>
        </div>


    <div class="container">
        <div class="row gy-7 gx-lg-7">
            <div class="col-lg-6 col-12 " data-cue="fadeIn">
                <div class="d-flex flex-column gap-3 mb-6">
                    <div>
                        <!-- <h2>Certified insurance companies</h2> -->
                        <p class="">
                        Explore our curated selection of certified insurance companies, each offering a wide range of insurance products tailored to meet your unique needs. With a focus on quality and reliability, we bring you top-notch service and protection from the best in the industry.</p>
<p class="">
    Discover the benefits of partnering with industry-leading
     insurance experts who are committed to providing you with exceptional
      coverage options. Our selected providers stand out for their dedication
       to customer satisfaction and their ability to offer solutions that cater to your specific requirements.

                    </div>
                </div>
            </div>
            <!-- //display just the insuranceCountries -->
            <div class="col-lg-6 col-12 mt-4" data-cue="fadeIn">
                <div class="row g-4">
                    <?php foreach (\common\models\InsuranceCountries::find()->where(['insurance_id' => $insurance->id])->all() as $company) : ?>

                        <div class="col-xl-4 col-6 col-md-4" data-cue="zoomIn">
                            <div class="card card-lift text-center py-3">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="<?= Yii::$app->request->baseUrl ?>/dashboard/images/<?= $company->company_logo ?>" alt="company" style="max-width: 150px;height: 80px;" />
                                    
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
<!-- <section class="pt-xl-9 py-5 bg-primary-dark">
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
</section> -->
<!--5m member end-->





<!--5m member start-->
<!-- <section class="pt-xl-9 py-5 bg-primary-dark">
    <div class="container" data-cue="fadeIn">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-12">
                <div class="text-center mb-xl-7 mb-5">
                    <h2 class="text-white-stable mb-3">Protect with Confidence: <span class="text-warning"><?= $insurance->name ?></span></h2>
                    <p class="mb-0 text-white-50">
                        <?= $insurance->description ?> </p>
                </div>
            </div>
        </div>

    </div>
</section> -->
<!--5m member end-->


<!--5m member start-->
<section class="pt-xl-9 py-5 bg-primary-dark">
    <div class="container" data-cue="fadeIn">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-12">
                <div class="text-center mb-xl-7 mb-5">
                    <h2 class="text-white-stable mb-3">Protect with Confidence: <span class="text-warning">Travel Insurance</span></h2>
                    <p class="mb-0 text-white-50">
                        Ensure worry-free living with our comprehensive insurance plans. Whether you need health, life, auto, or home insurance, we've got you covered with protection against unexpected events and emergencies.
                    </p>
                </div>
            </div>
        </div>
        <div class="row mb-7 pb-4 g-5 text-center text-lg-start">
            <div class="col-md-4" data-cue="fadeIn">
                <!-- <img src="/images/4066885_building_company_coverage_insurance_office_icon.png" width="80" /> -->

                <img width="80" height="80" src="/images/icons8-health-insurance-64 (1).png" class="mb-2"/>
                <h4 class="text-white-stable ">Health Insurance</h4>
                <p class="text-white-50 mb-3">Stay protected against unforeseen medical emergencies.</p>
                <ul class="text-white-50">
                    <li>Medical Expenses Coverage</li>
                    <li>Emergency Medical Evacuation</li>
                    <li>24/7 Medical Assistance</li>
                </ul>
            </div>
       

            <div class="col-md-4" data-cue="fadeIn">
            <img width="75" height="75" src="/images/icons8-home-insurance-64 (1).png" class="mb-2"/>
            <h3 class="text-white-stable">Property Insurance</h3>
                <p class="text-white-50 mb-3">Protect your home and belongings with comprehensive property insurance.</p>
                <ul class="text-white-50">
                    <li>Homeowners Insurance</li>
                    <li>Renters Insurance</li>
                    <li>Flood Insurance</li>
                </ul>
            </div>

            <div class="col-md-4" data-cue="fadeIn">


<img width="80" height="80" src="/images/icons8-travel-insurance-64 (1).png" class="mb-2"/>

<h4 class="text-white-stable">Travel Assistance</h4>
<p class="text-white-50 mb-3">Ensure smooth travels with comprehensive travel assistance services.</p>
<ul class="text-white-50">
    <li>Emergency Travel Assistance</li>
    <li>Trip Interruption Services</li>
    <li>Lost Passport Assistance</li>
</ul>
</div>
        </div>
    </div>
</section>
<!--5m member end-->



<script>
document.addEventListener('DOMContentLoaded', function() {
  flatpickr('.js-flatpickr', {
    dateFormat: "d/m/Y",
     minDate: 'today'
  });
});

</script>






<!-- Modal HTML -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<div class="modal fade border rounded shadow-sm" id="flashMessageModal" tabindex="-1" aria-labelledby="flashMessageModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content rounded shadow-sm">
         
                <div class="modal-body">
                <div class="modal-header border-0">
                    <!-- <h1 class="modal-title fs-5" id="flashMessageModalLabel">Modal title</h1> -->
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                    <div class="text-center">
                        <div class="d-flex justify-content-center pb-2">
                            <div class="check-container d-flex justify-content-center align-items-center ">
                                <img class="iconheight" src="https://cdn-icons-png.flaticon.com/512/7466/7466073.png" alt="check-lg" width="25%" height="90%">
                            </div>
                        </div>
                        <h3 class="fw-bold" style="color: #0F172A;">No Data Available</h3>

                        <small class="fw-bold">
    It seems there are no available options for your current selection. Please try changing the departure, arrival countries, and so on to see supported options.
</small>

                    </div>
                </div>
                <div class="modal-footer border-0 justify-content-center footer-color rounded-0 position-relative">
                    <div class="angle "></div>
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <!-- <div class="text-center p-4 "> -->
                    <!-- <p class="text-muted">For example, you might try selecting different countries to find available options, such as from Jordan to Lebanon.</p> -->
                    <!-- <style>
    .btn-custom-close {
        background-color: #f8f9fa; 
        border: 1px solid #dee2e6; 
        color: #0F172A; 
        font-size: 1.5rem; 
        line-height: 1; 
        width:80%; 
        height:23%; 
        display: flex; 
        align-items: center;
        justify-content: center; 
        border-radius: 10%; 
    }

    .btn-custom-close:hover {
        background-color: #e9ecef; 
        color: #0056b3;
    }

    .btn-custom-close:focus {
        box-shadow: none; 
    }
</style> -->

<!-- <button type="button" class="btn btn-custom-close shadow-none  rounded-0 px-5" data-bs-dismiss="modal" aria-label="Close">
   Close
</button> -->

                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
