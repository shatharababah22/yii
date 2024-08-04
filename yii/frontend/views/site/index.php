<?php

/** @var yii\web\View $this */
/** @var \frontend\models\InquiryForm $model */

use common\models\Countries;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

// $insurance_name = ($insurance !== null) ? htmlspecialchars($insurance->name, ENT_QUOTES, 'UTF-8') : $country->insurance->name;
$this->registerJsFile('https://code.jquery.com/jquery-3.6.0.min.js');

$this->title = '360Protect';



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
    height: 50%;
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
    height: 10px;
    width: 20px;
    top: -1px;
    left: 48%;
    background: #fff;
    clip-path: polygon(50% 50%, 0 0, 100% 0);
}












.carousel {
            /* margin: 50px auto; */
            padding: 0 80px;
        }
        .carousel .item {
            color: #747d89;
            min-height: 200px;
            text-align: center;
            overflow: hidden;
        }
        .carousel .thumb-wrapper {
            padding: 15px 15px;
            background: #fff;
            border-radius: 6px;
            text-align: center;
            position: relative;
            box-shadow: 0 2px 3px rgba(0,0,0,0.2);
        }
        .carousel .item .img-box {
            height: 100px;
            margin-bottom: 20px;
            border-radius: 20px;
            width: 100%;
            position: relative;
        }
        .carousel .item img {    
            max-width: 100%;
            max-height: 100%;
            border-radius: 20px;
            display: inline-block;
            position: absolute;
            bottom: 0;
            margin: 0 auto;
            left: 0;
            right: 0;
        }
        /* .carousel .item h4 {
            font-size: 18px;
        } */
        /* .carousel .item h4, .carousel .item p, .carousel .item ul {
            margin-bottom: 5px;
        } */
        .carousel .thumb-content .btn {
            color: #7ac400;
            font-size: 11px;
            text-transform: uppercase;
            font-weight: bold;
            background: none;
            border: 1px solid #7ac400;
            /* padding: 0px 20px; */
            margin-top: 5px;
            line-height: 16px;
            border-radius: 20px;
        }
        .carousel .thumb-content .btn:hover, .carousel .thumb-content .btn:focus {
            color: #fff;
            background: #7ac400;
            box-shadow: none;
        }
        .carousel .thumb-content .btn i {
            font-size: 14px;
            font-weight: bold;
            margin-left: 5px;
        }
        /* .carousel .item-price {
            font-size: 13px;
            padding: 2px 0;
        } */
        /* .carousel .item-price strike {
            opacity: 0.7;
            margin-right: 5px;
        } */
        .carousel-control-prev, .carousel-control-next {
            height: 44px;
            width: 40px;
            /* background: #7ac400;     */
            margin: auto 0;
            border-radius: 4px;
            opacity: 0.8;
        }
        /* .carousel-control-prev:hover, .carousel-control-next:hover {
            background: #78bf00;
            opacity: 1;
        } */
        .carousel-control-prev i, .carousel-control-next i {
            font-size: 36px;
            position: absolute;
            top: 50%;
            display: inline-block;
            margin: -19px 0 0 0;
            z-index: 5;
            left: 0;
            right: 0;
            color: #fff;
            text-shadow: none;
            font-weight: bold;
        }
        .carousel-control-prev i {
            margin-left: -2px;
        }
        .carousel-control-next i {
            margin-right: -4px;
        }        
        .carousel-indicators {
            bottom: -50px;
        }
        .carousel-indicators li, .carousel-indicators li.active {
            width: 10px;
            height: 10px;
            margin: 4px;
            border-radius: 50%;
            border: none;
        }
        .carousel-indicators li {    
            background: rgba(0, 0, 0, 0.2);
        }
        .carousel-indicators li.active {    
            background: rgba(0, 0, 0, 0.6);
        }
        /* .carousel .wish-icon {
            position: absolute;
            right: 10px;
            top: 10px;
            z-index: 99;
            cursor: pointer;
            font-size: 16px;
            color: #abb0b8;
        } */
    
        .star-rating li {
            padding: 0;
        }
        .star-rating i {
            font-size: 14px;
            color: #ffc000;
        }

        .carousel-item {
    transition: transform 60s ease-out; 
}
</style>


<!-- Include Bootstrap JS (Ensure it's the right version) -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- <script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('#carouselExampleControls');
    const carouselInstance = bootstrap.Carousel.getOrCreateInstance(carousel, {
        interval: 5000, 
        ride: 'carousel'
    });

    const prevButton = document.querySelector('#prevButton');
    const nextButton = document.querySelector('#nextButton');

    prevButton.addEventListener('click', function() {
        carouselInstance.prev();
    });

    nextButton.addEventListener('click', function() {
        carouselInstance.next();
    });
});

</script> -->


<section class="bg-primary-dark pt-9 right-slant-shape" data-cue="fadeIn">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-12">
                <div class="text-center text-lg-start mb-7 mb-lg-0" data-cues="slideInDown">
                    <div class="mb-4">
                        <h1 class="mb-5 display-5 text-white-stable">

                            Claim your <?php if ($country !== null) : ?>
                                <?php echo $country->insurance->name; ?>
                            <?php endif; ?> assurance
                            <span class="text-pattern-line text-warning"> within minutes</span>
                        </h1>
                        <p class="mb-0 text-white-50">
                            Worldwide & Schengen – Accepted by all Embassies. All our insurance covers COVID-19 100%.
                        </p>
                    </div>
                    <div data-cues="slideInDown">
                        <a href="#" class="btn btn-primary me-2">Get Covered Now</a>
                        <a href="#insurances_programs" class="btn btn-outline-warning">Explore Programs</a>
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
                                <?php $form = ActiveForm::begin(['action' => '/asurance/travel', 'method' => 'get', 'options' => ['class' => 'row needs-validation g-3']]) ?>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h3 class="mb-0 text-center">Get Covered</h3>
                                        <?= $form->field($model, 'type')->hiddenInput(['value' => $country->insurance_id ?? 1])->label(false) ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="ScheduleFirstnameInput" class="form-label">
                                        From
                                        <span class="text-danger">*</span>
                                    </label>
                                    <?php if ($country !== null) : ?>
                                        <?php
                                        $countries = Countries::find()->orderBy('country')->all();

                                        $allCountries = [];
                                        foreach ($countries as $country) {
                                            $code = strtoupper($country->code);
                                            $allCountries[$code] = $country->country;
                                        }

                                        $sourceCountryCode =  strtoupper($sourceCountry);

                                        if (isset($allCountries[$sourceCountryCode])) {
                                            $sourceCountryName = $allCountries[$sourceCountryCode];
                                            unset($allCountries[$sourceCountryCode]);
                                            $allCountries = [$sourceCountryCode => $sourceCountryName] + $allCountries;
                                        }

                                        echo $form->field($model, 'from_country')->dropDownList(
                                            $allCountries,
                                            [
                                                'options' => [
                                                    $sourceCountryCode => ['selected' => true],
                                                ],
                                            ]
                                        )->label(false);
                                        ?>




                                    <?php else : ?>

                                        <?= $form->field($model, 'from_country')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(
                                                Countries::find()->all(),
                                                'code',
                                                'country'
                                            ),
                                            ['prompt' => 'Departure']
                                        )->label(false) ?>

                                    <?php endif; ?>


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
                                    <!-- <?= $form->field($model, 'date')->textInput(['type' => 'date', 'min' => date('Y-m-d'), 'onclick' => '$(this).focus();'])->label(false) ?> -->
                                    <?= $form->field($model, 'date')->textInput([
            'type' => 'date',
            'class' => 'js-flatpickr form-control',
            'placeholder' => 'Select date'
        ])->label(false) ?>
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
                                <!-- Form Group -->



<!-- End Form Group -->


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
                    <?php foreach (\common\models\InsuranceCountries::find()->all() as $country) : ?>
                        <li class="list-inline-item d-inline-flex align-items-center me-3 mb-2 mb-lg-0">
                            <?php if (!empty($country->country_code)) : ?>

                                <img src="/assets/flags/<?= strtolower($country->country_code) ?>.png" class="rounded-circle" width="24" height="24" alt="<?= $country->source_country ?>" />
                            <?php else : ?>
                                <div class="flag-placeholder rounded-circle"></div>
                            <?php endif; ?>
                            <h6 class="my-2 ms-2"><?=  ucwords(strtolower($country->source_country)) ?></h6>
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

                        <div class="swiper-wrapper pb-4" id="swiper-wrapper-3ec847c46421dd89" aria-live="off">
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

<section class="my-xl-9 my-5" >
    <div class="container" data-cue="fadeIn">
    <div class="row">
            <!-- <div class="col-md-12" data-cue="fadeIn">
                <div class="mb-xl-7 mb-4 text-center">
                    <h2 class="mb-2">About
           Us
        </h2>
        <p class="mb-0">
 Find the perfect coverage tailored to your requirements and ensure you have the protection you need.
        </p>
                </div>
            </div> -->
        </div>
        <div class="row">
    <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
      <div class="col-12 col-lg-6 col-xl-5">
        <img class="img-fluid rounded" loading="lazy" src="images/travel.jpg" alt="About 1">
      </div>
      <div class="col-12 col-lg-6 col-xl-7">
        <div class="row justify-content-xl-center">
          <div class="col-12 col-xl-11">
            <h2 class="mb-3"> <span class="text-warning"> Who </span>Are We?</h2>
            <p class="  mb-3">
            At 360Protect, we specialize in providing comprehensive insurance solutions to safeguard your travels, belongings, and more. Whether you're embarking on a new adventure or simply seeking peace of mind, our goal is to offer tailored coverage that meets your unique needs.
            </p>
            <p class="mb-5">We pride ourselves on delivering exceptional insurance services with a focus on clarity and reliability. Our team is dedicated to ensuring that you receive the protection you need with the utmost convenience and efficiency.
            </p>

            <div class="row gy-4 gy-md-0 gx-xxl-5X">
              <div class="col-12 col-md-6">


              <a href="/asurance/about" class="btn btn-primary bsb-btn-2xl">
              Explore
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
              </svg>
            </a>
                <!-- <div class="d-flex">
                  <div class="me-4 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                      <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                    </svg>
                  </div>
                  <div>
                    <h2 class="h4 mb-3">Versatile Brand</h2>
                    <p class=" mb-0">We are crafting a digital method that subsists life across all mediums.</p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="d-flex">
                  <div class="me-4 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                      <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z" />
                    </svg>
                  </div>
                  <div>
                    <h2 class="h4 mb-3">Digital Agency</h2>
                    <p class=" mb-0">We believe in innovation by merging primary with elaborate ideas.</p>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  </div>
</section>








<!-- Fact 4 - Bootstrap Brain Component -->
<section class="py-5 py-xl-8 bg-primary-dark">
  <div class="container mb-2">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
     <h2 class="mb-2 text-white text-center">
    Key <span class="text-warning">Assurance</span> Statistics
</h2>
<p class="mb-5 text-center">
    Check out the essential figures and data related to insurance coverage.
</p>

        <!-- <hr class="w-50 mx-auto mb-5 mb-xl-9 border-secoundry-subtle "> -->
      </div>
    </div>
  </div>

  <div class="container overflow-hidden">
    <div class="row gy-5 gy-md-6 gy-lg-0">
      <div class="col-6 col-lg-3">
        <div class="text-center">
          <div class="d-flex align-items-center justify-content-center bg-white mb-3 mx-auto bsb-circle" >
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-people " viewBox="0 0 16 16">
              <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
            </svg>
          </div>
          <h5 class="display-6 fw-bold m-1 text-warning">120K</h5>
          <p class=" m-0">Happy Customers</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="text-center">
          <div class="d-flex align-items-center justify-content-center bg-white mb-3 mx-auto bsb-circle " >
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-activity " viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z" />
            </svg>
          </div>
          <h5 class="display-6 fw-bold m-1 text-white">1890+</h5>
          <p class=" m-0">Issues Solved</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="text-center">
          <div class="d-flex align-items-center justify-content-center bg-white mb-3 mx-auto bsb-circle" >
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-briefcase " viewBox="0 0 16 16">
              <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z" />
            </svg>
          </div>
          <h5 class="display-6 fw-bold m-1 text-warning">250K</h5>
          <p class=" m-0">Finished Projects</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="text-center">
          <div class="d-flex align-items-center justify-content-center bg-white mb-3 mx-auto bsb-circle" >
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-award " viewBox="0 0 16 16">
              <path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z" />
              <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z" />
            </svg>
          </div>
          <h5 class="display-6 fw-bold m-1 text-white">786+</h5>
          <p class=" m-0">Awwwards Winning</p>
        </div>
      </div>
    </div>
  </div>
</section>

 <!-- <section class="my-xl-9 my-5" id="insurances_programs">
    <div class="container" data-cue="fadeIn">
    <div class="row">
            <div class="col-md-12" data-cue="fadeIn">
                <div class="mb-xl-7 mb-4 text-center">
                    <h2 class="mb-2">
            Ansurance Types
        </h2>
        <p class="mb-0">
            Explore various related insurance options that might suit your needs.
        </p>
                </div>
            </div>
        </div>
        <div class="row">





        
 

        
<div class="scroll-container">
    <div class="scroll-wrapper">
        <?php foreach ($insurances as $insurance) : ?>
            <div class="scroll-item">
                <a href="<?= Url::to(['/asurance/programs', 'slug' => $insurance->slug]) ?>" class="card text-bg-light shadow" data-cue="fadeUp">
                    <img src="<?= Yii::$app->request->baseUrl ?>/dashboard/images/<?= $insurance->photo ?>" class="card-img" alt="img">
                    <div class="card-img-overlay text-white d-inline-flex justify-content-start align-items-end overlay-dark ">
                        <div class="text-capitalize">
                            <h2 class="card-title" style="font-size:x-large;"><?= $insurance->name ?></h2>
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








        </div>
    </div>
</section>  -->




<section class="my-xl-9 my-5" id="insurances_programs">
    <div class="container" data-cue="fadeIn">
    <div class="row">
            <div class="col-md-12" data-cue="fadeIn">
                <div class="mb-xl-7 mb-4 text-center">
                    <h2 class="mb-2">
            Ansurance Types
        </h2>
        <p class="mb-0">
            Explore various related insurance options that might suit your needs.
        </p>
                </div>
            </div>
        </div>
        <div class="row">






  
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
    <!-- Wrapper for carousel items -->
    <div class="carousel-inner">
        <?php 
        $totalItems = count($insurances);
        $itemsPerSlide = 3;
        $totalSlides = ceil($totalItems / $itemsPerSlide);

        for ($i = 0; $i < $totalSlides; $i++): 
            $start = $i * $itemsPerSlide;
            $end = min($start + $itemsPerSlide, $totalItems);
        ?>
            <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                <div class="row">
                    <?php for ($j = $start; $j < $end; $j++): ?>
                        <div class="col-sm-4">
                            <div class="thumb-wrapper">
                                <!-- <span class="wish-icon"><i class="fa fa-heart-o"></i></span> -->
                                 
                                <div class="img-box">
                                    <img src="<?= Yii::$app->request->baseUrl ?>/dashboard/images/<?= $insurances[$j]->photo ?>" class="img-fluid " alt="">                                    
                                </div>
                                <div class="thumb-content mt-2">
                                    <h4 class="d-flex justify-content-start"><?= $insurances[$j]->name ?></h4> 

                                     <div class="d-flex justify-content-start">
                                <div class="price-text">
                                    <span class="small">starts from </span>
                                    <div class="price price-show h1 text-warning">
                                        <span>$</span>
                                        <span><?= $insurance->price ?></span>
                                    </div>
                                </div>
                            </div>                                   
                                    <!-- <div class="star-rating">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                    </div> -->
                                                             <!-- <a href="#" class="btn btn-primary">Add to Cart</a> -->
                                </div>                        
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        <?php endfor; ?>
    </div>  
    
    <!-- Carousel controls -->
    <button class="carousel-control-prev btn btn-primary" type="button" id="prevButton">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next btn btn-primary" type="button" id="nextButton">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


            </div>
        </div>
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
                    <h2 class="text-white-stable mb-3">Protect with Confidence: <span class="text-warning">General Insurance</span></h2>
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
            <h4 class="text-white-stable">Property Insurance</h4>
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







<!--Get block card start-->
<section class="my-xl-7 py-5">
    <div class="container" data-cue="fadeIn">
        <div class="row">
            <div class="col-md-12" data-cue="fadeIn">
                <div class="mb-xl-7 mb-5 text-center">
                    <h2 class="mb-3">
                        How to Obtain Insurance in 3 Easy Steps
                    </h2>
                    <p class="mb-0">Secure your future in three easy steps: compare plans, choose coverage, and buy </p>
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
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg>
                            </span>
                        </div>

                        <h3 class="h4">Compare Plans</h3>
                        <p class="mb-0">Evaluate different insurance options to find the most suitable coverage for your needs.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12" data-cue="slideInLeft">
                    <div class="p-xl-5">
                        <div class="d-flex align-items-center justify-content-between mb-5">
                            <div class="icon-xl icon-shape rounded-circle bg-warning border border-warning-subtle border-4 text-dark fw-semibold fs-3">2</div>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-right text-body-tertiary" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg>
                            </span>
                        </div>

                        <h3 class="h4">Choose Coverage</h3>
                        <p class="mb-0">Select the specific protections you need, such as health, life, property, or auto insurance.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12" data-cue="slideInLeft">
                    <div class="p-xl-5">
                        <div class="d-flex align-items-center justify-content-between mb-5">
                            <div class="icon-xl icon-shape rounded-circle bg-warning border border-warning-subtle border-4 text-dark fw-semibold fs-3">3</div>
                        </div>

                        <h3 class="h4">Purchase Insurance</h3>
                        <p class="mb-0">Finalize your insurance purchase online or through a provider to ensure comprehensive protection.</p>
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
                        <h2 class="text-white-stable mb-3">Get your insurance online now</h2>
                        <p class="mb-0 text-white-50">
                            Ready to secure your future with peace of mind? Get your insurance online now and enjoy worry-free protection for all your needs!
                        </p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="text-center">
                        <a href="/" class="btn btn-primary">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
//   (function() {
//     // INITIALIZATION OF FLATPICKR
//     // =======================================================
//     HSCore.components.HSFlatpickr.init('.js-flatpickr')
//   })();
// </script>

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
            <div class="modal-content rounded shadow-sm"">
         
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

<small class="fw-bold ">It seems there are no available options for your current selection. Please try changing the departure and arrival countries to see supported options.</small>

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

                    </div>
                </div>
            </div>
        </div>
    </div>
