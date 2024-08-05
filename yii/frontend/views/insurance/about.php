<?php

/** @var yii\web\View $this */
/** @var \common\models\Policy[] $policies */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;
use common\models\Customers;
use common\models\InsuranceCountries;
use common\models\Insurances;
use common\models\Policy;
use common\widgets\Alert;


$this->title = 'About us';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>

/* 
.our-team{
    text-align: center;
    margin-bottom: 100px;
    z-index: 1;
    position: relative;
}
.our-team .pic{
    border-radius: 50%;
    overflow: hidden;
    position: relative;
}
.our-team .pic:after{
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: rgba(0,0,0,0.7);
    opacity: 0;
    position: absolute;
    top: 0;
    left: 0;
    transition: all 0.5s ease 0s;
}
.our-team:hover .pic:after{ opacity: 1; }
.our-team .pic img{
    width: 100%;
    height: auto;
}
.our-team .social{
    width: 100%;
    padding: 0;
    margin: 0;
    list-style: none;
    opacity: 0;
    position: absolute;
    top: 45%;
    left: 0;
    z-index: 1;
    transition: all 0.5s ease 0s;
}
.our-team:hover .social{ opacity: 1; }
.our-team .social li{ display: inline-block; }
.our-team .social li a{
    display: block;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 50%;
    border: 1px solid #fff;
    font-size: 15px;
    color: #fff;
    margin-right: 10px;
    transition: all 0.5s ease 0s;
}
.our-team .social li a:hover{
    background: #fff;
    color: #000;
}
.our-team .team-content{
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 2px dotted #2DAE87;
    position: absolute;
    bottom: -70px;
    left: 0;
    z-index: -1;
    transition: all 0.5s ease 0s;
}
.our-team:hover .team-content{ border: 2px dotted #2DAE87; }
.our-team .team-info{
    width: 100%;
    color: #464646;
    position: absolute;
    bottom: 12px;
    left: 0;
}
.our-team .title{
    font-size: 20px;
    font-weight: 600;
    color: #464646;
    margin: 0 0 5px 0;
    transition: all 0.5s ease 0s;
}
.our-team:hover .title{ color: #2DAE87; }
.our-team .post{
    display: block;
    font-size: 14px;
    color: #464646;
}

body, p, span{
  font-family: 'Roboto', sans-serif;
}
h1,h2,h3,h4,h5,h6,a{
  font-family: 'Rubik', sans-serif;
}

.finix-text h6{
  color: #e73c3e;
  font-weight: 400;
  font-size: 17px;
}
.finix-text h2 {
  font-weight: 400;
  font-size: 35px;
  margin-top: 20px;
  margin-bottom: 20px;
}
.finix-text p {
  color: #606060;
  font-size: 15px;
  line-height: 1.8rem;
} */
.why-choose-us {
  margin-top: 90px;

}
/* .why-choose-us .finix-text h2 {
  font-weight: 500;
} */
.why-choose-us .ct-btn {
  display: inline-block;
  width: 85px;
  height: 85px;
  
  line-height: 85px;
  text-align: center;
  border-radius: 50%;
  font-size: 60px;
  background: #fff;
  position: absolute;
  top: 77%;
  right: 43%;
}
.why-choose-us .ct-btn::before {
  content: "";
  height: 85px;
  width: 85px;
  
  position: absolute;
  top: 0;
  left: 0;
  background:#F1F5F9;
  border-radius: 50%;
  animation: choose 1.6s ease-out infinite;
}
@keyframes choose{
  0%,30%{
      transform: scale(0);
      opacity: 1;
  }
  50%{
      transform: scale(1.5);
      opacity: .7;
  }
  100%{
      transform: scale(2);
      opacity: 0;
  }
}
.why-choose-us .ct-btn a{
  color:#FFC107;
  
}
.why-choose-us .feature-box {
  background: #fff;
  padding: 10px;
  margin-bottom: 10px;
  position: relative;
  overflow: hidden;

  transition: .4s;
}
.why-choose-us .feature-box:hover {
  transform: translateY(-10px);
}
.why-choose-us .feature-box:hover .fbc-btn{
  /* background: #e73c3e; */
  color:#00112C;
  border: #00112C solid 1px;

}
.why-choose-us .feature-box::before {
  content: "";
  position: absolute;
  top: -115px;
  left: 0;
  right: 0;
  margin: auto;
  
  width: 90%;
  height: 70%;
  /* background: #F1F5F9; */
  border-radius: 50%;
}
.why-choose-us .fbc-btn {
  display: inline-block;
  height: 100px;
  width: 100px;
  line-height: 100px;
  background: #fff;
  border-radius: 50%;
  text-align: center;
  color: #FFC107;
  position: relative;
  transition: .4s;
  border: #00112C solid 1px;
}
.active-feature{
  margin-top: -30px;
}
.why-choose-us .finix-text{
  position: relative;
}
</style>
<!-- <div class="pattern-square"></div> -->
<section class="pt-10 pb-10 bg-dark text-center  ">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 col-12">
                <h1 class="mb-3 text-white-stable"><span class="text-warning">About</span> us</h1>
                <!-- <p class=" mb-4 text-center">The best way to contact us is to use our contact form below.<br> Please
                    fill out all of the required fields and we will get back to you as soon as possible.</p> -->
<p>Home / About us</p>
            </div>
        </div>
    </div>

</section>






<section class="my-xl-9 my-5" >
    <div class="container" data-cue="fadeIn">
    <!-- <div class="row">
            <div class="col-md-12" data-cue="fadeIn">
                <div class="mb-xl-7 mb-4 text-center">
                    <h2 class="mb-2">About
           Us
        </h2>
        <p class="mb-0">
 Find the perfect coverage tailored to your requirements and ensure you have the protection you need.
        </p>
                </div>
            </div>
        </div> -->
        <div class="row">
    <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
      <div class="col-12 col-lg-6 col-xl-5">
        <img class="img-fluid rounded" loading="lazy" src="/images/travel.jpg" alt="About 1">
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
            <p class="mb-5">As a dynamic and rapidly growing company, we remain grounded in our core values of integrity, innovation, and customer satisfaction. We are constantly evolving to enhance our offerings and deliver superior experiences. From travel and luggage insurance to other essential coverage options, we are here to support you every step of the way.
</p>

            <div class="row gy-4 gy-md-0 gx-xxl-5X">
              <div class="col-12 col-md-6">


              <!-- <a href="/asurance/about" class="btn btn-primary bsb-btn-2xl">
              Explore
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
              </svg>
            </a> -->
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
          <h3 class="fs-2 fw-bold m-1 text-warning"><?= Customers::find()->count() . ' +'; ?></h3>
          <p class=" m-0">Happy Customers</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="text-center">
          <div class="d-flex align-items-center justify-content-center  mx-auto  " >
               <svg width="55" height="55" fill="#65758C" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 124.888 124.887" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M122.148,88.708l-21.168-30.34c-0.584-0.838-1.479-1.41-2.485-1.589c-1.006-0.18-2.043,0.049-2.881,0.634L65.275,78.583 c-0.144,0.101-0.264,0.219-0.39,0.335c0.226-1.789-0.346-3.715-1.952-5.513c-1.384-1.551-3.192-2.586-5.246-3.225 c2.993-0.866,5.602-2.302,6.986-4.657c2.798-4.757-3.892-7.153-7.237-7.813c-6.752-1.333-13.97-1.11-20.746-0.102 c-4.056,0.604-8.587,1.54-12.399,3.548c-1.425-0.609-2.803-1.281-4.108-2.032c-4.161-2.396-3.358-4.868-0.719-7.011 c0.8,0.246,1.585,0.476,2.34,0.689c9.779,2.781,20.298,3.656,30.427,3.332c8.729-0.28,20.298-1.438,27.323-7.052 c5.406-4.319-1.216-7.947-5.604-9.432c12.279-2.104,26.054-6.427,18.184-14.369c-3.508-3.54-12.622-5.829-23.755-6.767 c-17.507-2.397-35.231-7.136-52.944-5.581c-6.014,0.527-12.743,2.299-14.971,8.56C-1.04,25.717,1.328,29.271,4.5,31.753 c-2.005,2.846-2.412,6.148-0.638,9.933c1.766,3.761,5.319,6.266,9.235,8.065c-4.981,7.292-0.914,12.315,5.878,15.669 c-6.257,7.76,0.615,13.244,8.557,16.566c-0.04,1.173,0.25,2.39,1.002,3.607c2.067,3.354,6.158,5.294,10.521,6.551 c-0.38,1.543,0.352,2.992,0.985,4.354c1.154,2.481,1.804,5.036,2.175,7.746c0.534,3.896,6.433,2.231,5.903-1.629 c-0.376-2.741-1.13-5.269-2.176-7.771c1.752-0.152,3.521-0.215,5.271-0.33c3.252-0.212,4.4-5.396,0.812-6.013 c-0.981-0.168-7.368-1.424-12.362-2.968c0.111,0.02,0.23,0.042,0.337,0.061c6.239,1.044,13.643,1.769,19.657-0.688 c1.708-0.696,3.064-1.739,3.979-2.977c0.034,0.699,0.249,1.397,0.679,2.016c1.218,1.745,3.62,2.172,5.366,0.954l3.044-2.123 l-3.951,22.19l40.974,7.294l3.95-22.189l2.125,3.045c0.609,0.871,1.515,1.415,2.485,1.587c0.971,0.174,2.008-0.024,2.881-0.633 C122.938,92.856,123.366,90.454,122.148,88.708z M58.111,49.571C48.008,50.812,37.479,50,27.539,47.89 c2.219-0.843,4.215-1.441,5.265-1.696c11.295-2.752,23.767-3.236,35.272-1.603c1.83,0.26,3.635,0.656,5.405,1.178 C68.998,48.143,62.919,48.981,58.111,49.571z M60.851,24.288c2.28,0.052,4.654,0.127,7.054,0.283l5.216,0.489 c4.628,0.589,9.181,1.642,13.188,3.61c0.3,0.147,1.454,0.602,1.403,0.854c-0.052,0.252-0.719,0.548-1.324,0.883 c-4.456,2.462-10.303,3.055-15.237,3.79c-16.302,2.431-34.034,1.299-50.062-2.308c-1.408-0.317-3.468-0.729-5.611-1.331 c4.427-2.105,10.059-3.113,13.25-3.787C39.22,24.553,50.15,24.045,60.851,24.288z M6.214,24.536 c-1.624-5.254,10.771-5.636,13.22-5.713c5.172-0.165,10.327,0.14,15.47,0.691c-10.646,1.52-20.216,4.229-26.098,8.201 C7.556,26.843,6.604,25.801,6.214,24.536z M9.107,37.356c0.137-0.893,0.455-1.707,0.917-2.454 c6.566,2.868,14.053,4.01,21.038,4.919c0.388,0.051,0.777,0.093,1.165,0.141c-5.061,0.986-10.372,2.52-14.479,5.29 C13.032,43.537,8.555,40.965,9.107,37.356z M34.796,64.123c6.721-1.464,14.229-1.702,21.014-0.509 c0.454,0.08,0.902,0.186,1.348,0.296c-2.837,1.145-6.912,1.217-9.198,1.313c-4.338,0.187-8.982-0.142-13.524-1.019 C34.571,64.172,34.697,64.144,34.796,64.123z M29.871,76.923c-2.836-1.106-5.339-2.625-6.742-4.774 c-1.073-1.645,0.004-3.119,1.88-4.346c5.633,1.796,11.78,2.809,16.063,3.264c-3.388,1.021-6.445,2.381-8.622,3.745 C31.508,75.404,30.624,76.118,29.871,76.923z M59.006,78.112c-0.883,4.008-14.958,1.948-17.374,1.581 c-1.345-0.205-2.936-0.454-4.616-0.785c3.105-1.582,7.361-2.275,9.82-2.689C48.397,75.956,59.56,75.592,59.006,78.112z M105.595,106.305l-9.021-1.604l2.222-12.474l-12.814-2.28l-2.221,12.472l-9.021-1.605l3.951-22.19l18.175-12.682l12.682,18.175 L105.595,106.305z"></path> <polygon points="124.888,47.688 113.989,45.481 113.15,33.354 105.329,42.59 93.792,34.637 98.47,49.555 101.391,48.637 99.373,42.202 105.876,46.682 110.617,41.083 111.097,48.019 118.763,49.57 114.146,54.288 117.183,60.98 107.822,57.781 106.833,60.677 122.897,66.168 117.8,54.931 "></polygon> </g> </g> </g></svg>

          </div>
          <h3 class="fw-bold m-1 fs-2  text-warning"><?= Insurances::find()->count() .' +';?></h3>          <p class=" m-0">Insurances types</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="text-center">
        <div class="d-flex align-items-center justify-content-center  mx-auto " >
        <svg fill="#65758C" viewBox="0 0 24 24" width="55" height="55"  xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M19 9.99611V12L22 9L19 6V7.99376C18.309 7.94885 17.9594 7.6644 17.4402 7.23176L17.4283 7.22188C16.7967 6.6955 15.9622 6 14.4 6C12.8378 6 12.0033 6.69551 11.3717 7.22188L11.3598 7.23178C10.7928 7.70427 10.428 8 9.6 8C8.772 8 8.40717 7.70427 7.84018 7.23178L7.82831 7.22188C7.59036 7.02357 7.32361 6.80126 7 6.60118V9.12312C7.58472 9.56529 8.36495 10 9.6 10C11.1622 10 11.9967 9.30449 12.6283 8.77812L12.6402 8.76822C13.2072 8.29573 13.572 8 14.4 8C15.228 8 15.5928 8.29573 16.1598 8.76821L16.1717 8.77811C16.7758 9.28156 17.5655 9.93973 19 9.99611Z"></path> <path d="M7 17.1231C7.58472 17.5653 8.36495 18 9.6 18C11.1622 18 11.9967 17.3045 12.6283 16.7781L12.6402 16.7682C13.2072 16.2957 13.572 16 14.4 16C15.228 16 15.5928 16.2957 16.1598 16.7682L16.1717 16.7781C16.7758 17.2816 17.5655 17.9397 19 17.9961V20L22 17L19 14V15.9938C18.309 15.9488 17.9594 15.6644 17.4402 15.2318L17.4283 15.2219C16.7967 14.6955 15.9622 14 14.4 14C12.8378 14 12.0033 14.6955 11.3717 15.2219L11.3598 15.2318C10.7928 15.7043 10.428 16 9.6 16C8.772 16 8.40717 15.7043 7.84018 15.2318L7.82831 15.2219C7.59036 15.0236 7.32361 14.8013 7 14.6012V17.1231Z"></path> <path d="M5 4H15V8.03662C15.8985 8.15022 16.5162 8.51098 17 8.87686V4C17 2.89543 16.1046 2 15 2H5C3.89543 2 3 2.89543 3 4V20C3 21.1046 3.89543 22 5 22H15C16.1046 22 17 21.1046 17 20V19.3988C16.6764 19.1987 16.4096 18.9764 16.1717 18.7781L16.1598 18.7682C15.7512 18.4277 15.4476 18.179 15 18.0666V20H5L5 4Z"></path> <path d="M15 16.0366C15.8985 16.1502 16.5162 16.511 17 16.8769V11.3988C16.6764 11.1987 16.4096 10.9764 16.1717 10.7781L16.1598 10.7682C15.7512 10.4277 15.4476 10.179 15 10.0666V16.0366Z"></path> </g></svg>

          </div>
          <h3 class=" fw-bold m-1 fs-2  text-warning"><?= Policy::find()->count() .' +';?></h3>
          <p class=" m-0">Policies</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="text-center">
        <div class="d-flex align-items-center justify-content-center  mx-auto " >
        <svg viewBox="0 0 24 24" width="55" height="55"  xmlns="http://www.w3.org/2000/svg" aria-labelledby="supportIconTitle" stroke="#65758C" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title id="supportIconTitle">Support</title> <path stroke-linecap="round" d="M11 8L9.42229 7.21115C9.14458 7.07229 8.83835 7 8.52786 7H7.82843C7.29799 7 6.78929 7.21071 6.41421 7.58579L5.58579 8.41421C5.21071 8.78929 5 9.29799 5 9.82843L5 14.9296C5 15.5983 5.3342 16.2228 5.8906 16.5937L9.75746 19.1716C10.4944 19.663 11.4668 19.611 12.1472 19.044L17 15"></path> <path d="M14.4549 12.9142C13.8515 12.1062 12.741 11.8739 11.8643 12.3721L10.009 13.4266C9.41298 13.7653 8.66412 13.6641 8.17937 13.1794V13.1794C7.54605 12.546 7.59324 11.5056 8.2813 10.9323L12.4437 7.46356C12.8032 7.16403 13.2562 7 13.7241 7H14.5279C14.8384 7 15.1446 7.07229 15.4223 7.21115L17.8944 8.44721C18.572 8.786 19 9.47852 19 10.2361L19 12.9796C19 14.9037 16.5489 15.718 15.3976 14.1764L14.4549 12.9142Z"></path> <path d="M1 17V8"></path> <path d="M1 17V8"></path> <path d="M23 17V8"></path> </g></svg>

          </div>
          <h3 class=" fw-bold m-1 fs-2  text-warning"><?= InsuranceCountries::find()->count() .' +';?></h3>
          <p class=" m-0">Insurance Countries Supported</p>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="why-choose-us active my-xl-9 my-5">

    <div class="container">
      <div class="row">
      <div class="col-md-12" data-cue="fadeIn">
                <div class="mb-xl-7 mb-4 text-center">
                    <h2 class="mb-2">
                    Why Choose Us?
        </h2>
        <p class="mb-0">
            Explore various related insurance options that might suit your needs.
        </p>
                </div>
            </div>
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-3">
              <div class="feature-box shadow-sm rounded p-4">
                <div class="feature-box-content text-center">
                 <div class="fbc-btn mb-3">
                  <i class="fas fa-check-circle fs-4"></i>
                  </div>
                  <h5 class="fw-bold">Comprehensive Coverage</h5>
                  <p class="fs-5">Extensive coverage options tailored for travel, luggage, and more.</p>
                  </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="feature-box shadow-sm rounded p-4">
                <div class="feature-box-content text-center ">
                 <div class="fbc-btn mb-3">
                  <i class="fas fa-handshake fs-4"></i>
                  </div>
                  <h5 class="fw-bold">Trusted Partnerships</h5>
                  <p class="fs-5">Collaborating with top providers to ensure reliable, trusted coverage.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="feature-box shadow-sm rounded p-4">
                <div class="feature-box-content text-center">
                  <div class="fbc-btn mb-3">
                  <i class="fas fa-thumbs-up fs-4"></i>
                  </div>
                  <h5 class="fw-bold">Customer Satisfaction</h5>

                  <p class="fs-5">Dedicated support for personalized assistance and exceptional service.</p>
                </div>
              </div>
            </div>


            <div class="col-lg-3">
              <div class="feature-box shadow-sm rounded p-4">
                <div class="feature-box-content text-center">
                 <div class="fbc-btn mb-3">
                  <i class="fas fa-shield-alt fs-4"></i>
                  </div>
                  <h5 class="fw-bold">Secure and Reliable</h5>


                  <p class="fs-5">Dedicated support for personalized assistance and exceptional service.</p>
                </div>
              </div>
            </div>

<!-- 
            <div class="col-lg-3">
              <div class="feature-box active-feature">
                <div class="feature-box-content text-center">
                 <div class="fbc-btn mb-3">
                  <i class="fas fa-shield-alt fs-4"></i>
                  </div>
                  <h5 class="fw-bold">Secure and Reliable</h5>
                  <p class="fs-5">Dedicated support for personalized assistance and exceptional service.</p>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- Team 1 - Bootstrap Brain Component -->
<!-- 
<section class="my-xl-9 my-5">
  <div class="container ">
  <div class="row justify-content-center ">
      <div class="col-md-7 text-center">
        <h3 class="mb-3">Experienced & Professional Team</h3>
        <h6 class="subtitle font-weight-normal">You can relay on our amazing features list and also our customer services will be great experience for you without doubt and in no-time</h6>
      </div>
    </div>
  </div>
  
<div class="container   " style="margin-top: 2.5%;">
    <div class="row  justify-content-center">
        <div class="col-md-3 col-sm-6">
            <div class="our-team">
                <div class="pic">
                    <img src="https://media-doh1-1.cdn.whatsapp.net/v/t61.24694-24/434052731_1684943418708219_8368274833351239141_n.jpg?ccb=11-4&oh=01_Q5AaIK79gXwwz1N-yx5UnOdwmSmoxO9mmpKSCIv1SOcdFvyS&oe=66B4D22E&_nc_sid=e6ed6c&_nc_cat=102">
                    <ul class="social">
                        <li><a href="#" class="fab fa-facebook"></a></li>
                        <li><a href="#" class="fab fa-twitter"></a></li>
                        <li><a href="#" class="fab fa-google-plus"></a></li>
                        <li><a href="#" class="fab fa-linkedin"></a></li>
                    </ul>
                </div>
                <div class="team-content">
                    <div class="team-info">
                        <h3 class="title">Ahamd Abu Taha</h3>
                        <span class="post">Web Developer</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-3 col-sm-6">
            <div class="our-team">
                <div class="pic">
                    <img src="https://media-doh1-1.cdn.whatsapp.net/v/t61.24694-24/434052731_1684943418708219_8368274833351239141_n.jpg?ccb=11-4&oh=01_Q5AaIK79gXwwz1N-yx5UnOdwmSmoxO9mmpKSCIv1SOcdFvyS&oe=66B4D22E&_nc_sid=e6ed6c&_nc_cat=102">
                    <ul class="social">
                        <li><a href="#" class="fab fa-facebook"></a></li>
                        <li><a href="#" class="fab fa-twitter"></a></li>
                        <li><a href="#" class="fab fa-google-plus"></a></li>
                        <li><a href="#" class="fab fa-linkedin"></a></li>
                    </ul>
                </div>
                <div class="team-content">
                    <div class="team-info">
                        <h3 class="title">Ahamd Abu Taha</h3>
                        <span class="post">Web Developer</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="our-team">
                <div class="pic">
                    <img src="https://media-doh1-1.cdn.whatsapp.net/v/t61.24694-24/434052731_1684943418708219_8368274833351239141_n.jpg?ccb=11-4&oh=01_Q5AaIK79gXwwz1N-yx5UnOdwmSmoxO9mmpKSCIv1SOcdFvyS&oe=66B4D22E&_nc_sid=e6ed6c&_nc_cat=102">
                    <ul class="social">
                        <li><a href="#" class="fab fa-facebook"></a></li>
                        <li><a href="#" class="fab fa-twitter"></a></li>
                        <li><a href="#" class="fab fa-google-plus"></a></li>
                        <li><a href="#" class="fab fa-linkedin"></a></li>
                    </ul>
                </div>
                <div class="team-content">
                    <div class="team-info">
                        <h3 class="title">Ahamd Abu Taha</h3>
                        <span class="post">Web Developer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div></section>

     -->