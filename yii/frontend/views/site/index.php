<?php

/** @var yii\web\View $this */
/** @var \frontend\models\InquiryForm $model */

use common\models\Countries;
use common\models\Customers;
use common\models\InsuranceCountries;
use common\models\Insurances;
use common\models\Policy;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

// $insurance_name = ($insurance !== null) ? htmlspecialchars($insurance->name, ENT_QUOTES, 'UTF-8') : $country->insurance->name;
$this->registerJsFile('https://code.jquery.com/jquery-3.6.0.min.js');

$this->title = '360Protect';



$flashMessage = Yii::$app->session->getFlash('errorr');
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
            padding: 0 60px;
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
            height: 80px;
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
        /* .carousel .thumb-content .btn:hover, .carousel .thumb-content .btn:focus {
            color: #fff;
            background: #7ac400;
            box-shadow: none;
        } */
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
            background: #7ac400;    
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
    transition: transform 1.2s ease-in-out; 
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
            <div class="col-lg-5 col-12 mb-4">
                <div class="text-center text-lg-start mb-lg-4 mb-lg-0 mt-5" data-cues="slideInDown">
                    <div class="mb-4">
                        <h2 class="mb-5 display-6 text-white-stable">

                            Claim your travel assurance
                            <span class="text-pattern-line text-warning"> within minutes</span>
                        </h2>
                        <p class="mb-0 text-white-50">
                            Worldwide & Schengen – Accepted by all Embassies. All our insurance covers COVID-19 100%.
                        </p>
                    </div>
                    <div class="slideInDown  d-none d-md-block">
                        <a href="#" class="btn btn-primary">Get Covered Now</a>
                        <a href="#insurances_programs" class="btn btn-outline-warning ">Explore Programs</a>
                    </div>

                </div><div class="col-12 d-flex justify-content-center d-md-none ">
            <a href="#" class="btn btn-primary me-2">Get Covered Now</a>
            <a href="#insurances_programs" class="btn btn-outline-warning ">Explore Programs</a>
        </div>
                <?php if ($country !== null) : ?>
                    <div class="country-details d-flex justify-content-center justify-content-lg-start mb-4 mb-lg-0">
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
                                    <?= $form->field($model, 'date')->textInput([
            'type' => 'text',
            'class' => 'js-flatpickr form-control flatpickr-input ',
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
      <div class="col-12 col-lg-6 col-xl-5 d-lg-block d-none">
        <img class="img-fluid rounded" loading="lazy" src="<?= Yii::$app->request->baseUrl ?>/images/travel.jpg" alt="About 1">
      </div>
      <div class="col-12 col-lg-6 col-xl-7 ">
        <div class="row justify-content-xl-center">
          <div class="col-12 col-xl-11">
            <h2 class="mb-3 display-5 d-lg-none"> <span class="text-warning"> Who </span>Are We?</h2>
            <h2 class="mb-3 d-none d-lg-block"> <span class="text-warning"> Who </span>Are We?</h2>
            <p class="mb-3">
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
    <div class="row gy-4 gy-md-6 gy-lg-0">
      <div class="col-6 col-lg-3">
        <div class="text-center">
          <div class="d-flex align-items-center justify-content-center  mx-auto  " >
          <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor" class="bi bi-people " viewBox="0 0 16 16">
              <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
            </svg>
          </div>
          <h3 class="fs-2 fw-bold m-1 text-white mt-2"><?= Customers::find()->count() . ' +'; ?></h3>
          <p class=" m-0">Happy Customers</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="text-center">
          <div class="d-flex align-items-center justify-content-center  mx-auto  " >
<svg width="55" " height="55"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" 
xml:space="preserve" fill="#65758C" stroke="#65758C"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect x="296" y="328" style="fill:#65758C;" width="192" height="96"></rect> <g> <path style="fill:#65758C;" d="M415.264,263.48c-33.528-20.704-78.192-20.48-111.504,0.64 c-1.88-66.784-15.552-133.592-39.824-165.216C344.904,113.144,407.832,180.392,415.264,263.48z"></path> <path style="fill:#65758C;" d="M48.736,263.48c7.432-83.08,70.36-150.328,151.328-164.576 c-24.272,31.624-37.944,98.432-39.824,165.216C126.928,242.984,82.264,242.768,48.736,263.48z"></path> <path style="fill:#65758C;" d="M176.272,263.864C179.032,164.176,206.856,96,232,96s52.968,68.176,55.728,167.864 c-14.424-9.032-30.912-14.184-47.728-15.416V248h-16v0.448C207.192,249.68,190.696,254.832,176.272,263.864z"></path> </g> <g> <path style="fill:#65758C;" d="M424,280c-17.92-16.24-41.52-24.24-65.04-24C351.12,161.28,297.28,88,232,88C338,88,424,174,424,280 z"></path> <path style="fill:#65758C;" d="M232,88c-35.36,0-64,86-64,192c-17.44-15.76-40.08-23.76-62.96-24C112.88,161.28,166.72,88,232,88z"></path> <path style="fill:#65758C;" d="M296,280c-17.68-16-40.8-24-64-24V88C267.36,88,296,174,296,280z"></path> </g> <g> <circle style="fill:#65758C;" cx="136" cy="352" r="40"></circle> <circle style="fill:#65758C;" cx="48" cy="408" r="32"></circle> <circle style="fill:#65758C;" cx="120" cy="472" r="24"></circle> </g> <g> <rect x="440" y="368" style="fill:#65758C;" width="16" height="16"></rect> <rect x="328" y="368" style="fill:#65758C;" width="16" height="16"></rect> </g> <g> <rect x="408" y="40" style="fill:#0C3847;" width="16" height="96"></rect> <rect x="40" y="40" style="fill:#0C3847;" width="16" height="96"></rect> <rect x="88" style="fill:#0C3847;" width="16" height="80"></rect> <rect x="360" y="56" style="fill:#0C3847;" width="16" height="40"></rect> <rect x="184" y="8" style="fill:#0C3847;" width="16" height="32"></rect> <rect x="136" y="32" style="fill:#0C3847;" width="16" height="40"></rect> <rect x="312" y="8" style="fill:#0C3847;" width="16" height="56"></rect> <path style="fill:#0C3847;" d="M288,472c0,13.232-10.768,24-24,24s-24-10.768-24-24V264.328c18.4,1.6,36.32,8.752,50.424,21.424 l5.016,5.544l0.56-0.512l0.56,0.512l5.016-5.544c32.352-29.08,84.784-29.032,117.056,0.176L432,298.032V280 c0-107.6-85.416-195.576-192-199.8V56h-16v24.2C117.416,84.424,32,172.4,32,280v18.032l13.368-12.104 c32.264-29.2,84.704-29.256,117.056-0.176l5.016,5.544l0.56-0.512l0.56,0.512l5.016-5.544C187.68,273.08,205.6,265.928,224,264.328 V472c0,22.056,17.944,40,40,40s40-17.944,40-40v-8h-16V472z M415.264,263.48c-33.528-20.704-78.192-20.48-111.504,0.64 c-1.88-66.784-15.552-133.592-39.824-165.216C344.904,113.144,407.832,180.392,415.264,263.48z M48.736,263.48 c7.432-83.08,70.36-150.328,151.328-164.576c-24.272,31.624-37.944,98.432-39.824,165.216 C126.928,242.984,82.264,242.768,48.736,263.48z M176.272,263.864C179.032,164.176,206.856,96,232,96s52.968,68.176,55.728,167.864 c-14.424-9.032-30.912-14.184-47.728-15.416V248h-16v0.448C207.192,249.68,190.696,254.832,176.272,263.864z"></path> <path style="fill:#0C3847;" d="M392,344c-17.648,0-32,14.352-32,32s14.352,32,32,32s32-14.352,32-32S409.648,344,392,344z M392,392 c-8.824,0-16-7.176-16-16s7.176-16,16-16s16,7.176,16,16S400.824,392,392,392z"></path> <path style="fill:#0C3847;" d="M280,312v128h224V312H280z M456.448,421.36l-0.92,2.64H328.52l-1.016-2.76 c-4.712-12.832-16.32-24.408-28.864-28.8l-2.64-0.912v-31l2.76-1.016c12.84-4.72,24.408-16.32,28.792-28.864l0.92-2.648h127 l1.016,2.76c4.712,12.832,16.32,24.408,28.864,28.8l2.648,0.912v31l-2.76,1.016C472.4,397.208,460.832,408.816,456.448,421.36z M488,343.312c-6.208-3.04-12.072-8.92-15.272-15.312H488V343.312z M311.312,328c-3.04,6.208-8.92,12.072-15.312,15.272V328 H311.312z M296,408.688c6.208,3.04,12.072,8.92,15.272,15.312H296V408.688z M472.688,424c3.04-6.208,8.92-12.072,15.312-15.272V424 H472.688z"></path> <path style="fill:#0C3847;" d="M136,304c-26.472,0-48,21.528-48,48s21.528,48,48,48s48-21.528,48-48S162.472,304,136,304z M136,384 c-17.648,0-32-14.352-32-32s14.352-32,32-32s32,14.352,32,32S153.648,384,136,384z"></path> <path style="fill:#0C3847;" d="M48,368c-22.056,0-40,17.944-40,40s17.944,40,40,40s40-17.944,40-40S70.056,368,48,368z M48,432 c-13.232,0-24-10.768-24-24s10.768-24,24-24s24,10.768,24,24S61.232,432,48,432z"></path> <path style="fill:#0C3847;" d="M120,440c-17.648,0-32,14.352-32,32s14.352,32,32,32s32-14.352,32-32S137.648,440,120,440z M120,488 c-8.824,0-16-7.176-16-16s7.176-16,16-16s16,7.176,16,16S128.824,488,120,488z"></path> </g> <circle style="fill:#65758C;" cx="392" cy="376" r="16"></circle> </g></svg>          </div>
          <h3 class="fw-bold m-1 fs-2  mt-2 text-warning"><?= Insurances::find()->count() .' +';?></h3>          <p class=" m-0">Insurances types</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="text-center">
        <div class="d-flex align-items-center justify-content-center  mx-auto " >
        <svg fill="#65758C" viewBox="0 0 24 24" width="55" height="55"  xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" 
            stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">
                 <path d="M19 9.99611V12L22 9L19 6V7.99376C18.309 7.94885 17.9594 7.6644 17.4402 7.23176L17.4283 7.22188C16.7967 6.6955 15.9622 6 14.4 6C12.8378 6 12.0033 6.69551 11.3717 7.22188L11.3598 7.23178C10.7928 7.70427 10.428 8 9.6 8C8.772 8 8.40717 7.70427 7.84018 7.23178L7.82831 7.22188C7.59036 7.02357 7.32361 6.80126 7 6.60118V9.12312C7.58472 9.56529 8.36495 10 9.6 10C11.1622 10 11.9967 9.30449 12.6283 8.77812L12.6402 8.76822C13.2072 8.29573 13.572 8 14.4 8C15.228 8 15.5928 8.29573 16.1598 8.76821L16.1717 8.77811C16.7758 9.28156 17.5655 9.93973 19 9.99611Z"></path> <path d="M7 17.1231C7.58472 17.5653 8.36495 18 9.6 18C11.1622 18 11.9967 17.3045 12.6283 16.7781L12.6402 16.7682C13.2072 16.2957 13.572 16 14.4 16C15.228 16 15.5928 16.2957 16.1598 16.7682L16.1717 16.7781C16.7758 17.2816 17.5655 17.9397 19 17.9961V20L22 17L19 14V15.9938C18.309 15.9488 17.9594 15.6644 17.4402 15.2318L17.4283 15.2219C16.7967 14.6955 15.9622 14 14.4 14C12.8378 14 12.0033 14.6955 11.3717 15.2219L11.3598 15.2318C10.7928 15.7043 10.428 16 9.6 16C8.772 16 8.40717 15.7043 7.84018 15.2318L7.82831 15.2219C7.59036 15.0236 7.32361 14.8013 7 14.6012V17.1231Z"></path> <path d="M5 4H15V8.03662C15.8985 8.15022 16.5162 8.51098 17 8.87686V4C17 2.89543 16.1046 2 15 2H5C3.89543 2 3 2.89543 3 4V20C3 21.1046 3.89543 22 5 22H15C16.1046 22 17 21.1046 17 20V19.3988C16.6764 19.1987 16.4096 18.9764 16.1717 18.7781L16.1598 18.7682C15.7512 18.4277 15.4476 18.179 15 18.0666V20H5L5 4Z"></path> <path d="M15 16.0366C15.8985 16.1502 16.5162 16.511 17 16.8769V11.3988C16.6764 11.1987 16.4096 10.9764 16.1717 10.7781L16.1598 10.7682C15.7512 10.4277 15.4476 10.179 15 10.0666V16.0366Z"></path> </g></svg>

          </div>
          <h3 class=" fw-bold m-1 fs-2  text-white mt-2"><?= Policy::find()->count() .' +';?></h3>
          <p class=" m-0">Policies</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="text-center">
        <div class="d-flex align-items-center justify-content-center  mx-auto " >
        <svg fill="#65758C"   width="55" height="55"  viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M8 2L8 6L4 6L4 48L46 48L46 14L30 14L30 6L26 6L26 2 Z M 10 4L24 4L24 8L28 8L28 46L19 46L19 39L15 39L15 46L6 46L6 8L10 8 Z M 10 10L10 12L12 12L12 10 Z M 14 10L14 12L16 12L16 10 Z M 18 10L18 12L20 12L20 10 Z M 22 10L22 12L24 12L24 10 Z M 10 15L10 19L12 19L12 15 Z M 14 15L14 19L16 19L16 15 Z M 18 15L18 19L20 19L20 15 Z M 22 15L22 19L24 19L24 15 Z M 30 16L44 16L44 46L30 46 Z M 32 18L32 20L34 20L34 18 Z M 36 18L36 20L38 20L38 18 Z M 40 18L40 20L42 20L42 18 Z M 10 21L10 25L12 25L12 21 Z M 14 21L14 25L16 25L16 21 Z M 18 21L18 25L20 25L20 21 Z M 22 21L22 25L24 25L24 21 Z M 32 22L32 24L34 24L34 22 Z M 36 22L36 24L38 24L38 22 Z M 40 22L40 24L42 24L42 22 Z M 32 26L32 28L34 28L34 26 Z M 36 26L36 28L38 28L38 26 Z M 40 26L40 28L42 28L42 26 Z M 10 27L10 31L12 31L12 27 Z M 14 27L14 31L16 31L16 27 Z M 18 27L18 31L20 31L20 27 Z M 22 27L22 31L24 31L24 27 Z M 32 30L32 32L34 32L34 30 Z M 36 30L36 32L38 32L38 30 Z M 40 30L40 32L42 32L42 30 Z M 10 33L10 37L12 37L12 33 Z M 14 33L14 37L16 37L16 33 Z M 18 33L18 37L20 37L20 33 Z M 22 33L22 37L24 37L24 33 Z M 32 34L32 36L34 36L34 34 Z M 36 34L36 36L38 36L38 34 Z M 40 34L40 36L42 36L42 34 Z M 32 38L32 40L34 40L34 38 Z M 36 38L36 40L38 40L38 38 Z M 40 38L40 40L42 40L42 38 Z M 10 39L10 44L12 44L12 39 Z M 22 39L22 44L24 44L24 39 Z M 32 42L32 44L34 44L34 42 Z M 36 42L36 44L38 44L38 42 Z M 40 42L40 44L42 44L42 42Z"></path></g></svg>
          </div>
          <h3 class=" fw-bold m-1 fs-2 mt-2 text-warning"><?= InsuranceCountries::find()->count() .' +';?></h3>
          <p class=" m-0">Insurance Countries Supported</p>
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
                    <h2 class="mb-2">Insurance Types</h2>
                    <p class="mb-0">Explore various related insurance options that might suit your needs.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="carouselExampleControls" class="carousel slide">
                <div class="carousel-inner">
                    <?php
                    $chunkedInsurances = array_chunk($insurances, 3);
                    foreach ($chunkedInsurances as $index => $chunk) : ?>
                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                            <div class="row">
                                <?php foreach ($chunk as $insurance) : ?>
                                    <div class="col-sm-4">
                                        <div class="thumb-wrapper mb-2">
                                            <div class="img-box">

                                            <a href="<?= Url::to(['/insurance/programs', 'slug' => $insurance->slug]) ?>" data-cue="fadeUp">

                                                <img src="<?= Yii::$app->request->baseUrl ?>/dashboard/images/<?= $insurance->photo ?>" class="img-fluid" alt=""></a>
                                            </div>
                                            <div class="thumb-content mt-2">
                                                <h4 class="d-flex justify-content-start"><?= $insurance->name ?></h4>
                                                <div class="d-flex justify-content-start">
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
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            
                <button class="carousel-control-prev btn btn-primary" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next btn btn-primary" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
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
