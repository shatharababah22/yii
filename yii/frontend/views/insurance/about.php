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
          <h3 class="fs-2 fw-bold m-1 text-white"><?= Customers::find()->count() . ' +'; ?></h3>
          <p class=" m-0">Happy Customers</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="text-center">
          <div class="d-flex align-items-center justify-content-center  mx-auto  " >
<svg width="55" height="55"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#65758C" stroke="#65758C"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect x="296" y="328" style="fill:#65758C;" width="192" height="96"></rect> <g> <path style="fill:#65758C;" d="M415.264,263.48c-33.528-20.704-78.192-20.48-111.504,0.64 c-1.88-66.784-15.552-133.592-39.824-165.216C344.904,113.144,407.832,180.392,415.264,263.48z"></path> <path style="fill:#65758C;" d="M48.736,263.48c7.432-83.08,70.36-150.328,151.328-164.576 c-24.272,31.624-37.944,98.432-39.824,165.216C126.928,242.984,82.264,242.768,48.736,263.48z"></path> <path style="fill:#65758C;" d="M176.272,263.864C179.032,164.176,206.856,96,232,96s52.968,68.176,55.728,167.864 c-14.424-9.032-30.912-14.184-47.728-15.416V248h-16v0.448C207.192,249.68,190.696,254.832,176.272,263.864z"></path> </g> <g> <path style="fill:#65758C;" d="M424,280c-17.92-16.24-41.52-24.24-65.04-24C351.12,161.28,297.28,88,232,88C338,88,424,174,424,280 z"></path> <path style="fill:#65758C;" d="M232,88c-35.36,0-64,86-64,192c-17.44-15.76-40.08-23.76-62.96-24C112.88,161.28,166.72,88,232,88z"></path> <path style="fill:#65758C;" d="M296,280c-17.68-16-40.8-24-64-24V88C267.36,88,296,174,296,280z"></path> </g> <g> <circle style="fill:#65758C;" cx="136" cy="352" r="40"></circle> <circle style="fill:#65758C;" cx="48" cy="408" r="32"></circle> <circle style="fill:#65758C;" cx="120" cy="472" r="24"></circle> </g> <g> <rect x="440" y="368" style="fill:#65758C;" width="16" height="16"></rect> <rect x="328" y="368" style="fill:#65758C;" width="16" height="16"></rect> </g> <g> <rect x="408" y="40" style="fill:#0C3847;" width="16" height="96"></rect> <rect x="40" y="40" style="fill:#0C3847;" width="16" height="96"></rect> <rect x="88" style="fill:#0C3847;" width="16" height="80"></rect> <rect x="360" y="56" style="fill:#0C3847;" width="16" height="40"></rect> <rect x="184" y="8" style="fill:#0C3847;" width="16" height="32"></rect> <rect x="136" y="32" style="fill:#0C3847;" width="16" height="40"></rect> <rect x="312" y="8" style="fill:#0C3847;" width="16" height="56"></rect> <path style="fill:#0C3847;" d="M288,472c0,13.232-10.768,24-24,24s-24-10.768-24-24V264.328c18.4,1.6,36.32,8.752,50.424,21.424 l5.016,5.544l0.56-0.512l0.56,0.512l5.016-5.544c32.352-29.08,84.784-29.032,117.056,0.176L432,298.032V280 c0-107.6-85.416-195.576-192-199.8V56h-16v24.2C117.416,84.424,32,172.4,32,280v18.032l13.368-12.104 c32.264-29.2,84.704-29.256,117.056-0.176l5.016,5.544l0.56-0.512l0.56,0.512l5.016-5.544C187.68,273.08,205.6,265.928,224,264.328 V472c0,22.056,17.944,40,40,40s40-17.944,40-40v-8h-16V472z M415.264,263.48c-33.528-20.704-78.192-20.48-111.504,0.64 c-1.88-66.784-15.552-133.592-39.824-165.216C344.904,113.144,407.832,180.392,415.264,263.48z M48.736,263.48 c7.432-83.08,70.36-150.328,151.328-164.576c-24.272,31.624-37.944,98.432-39.824,165.216 C126.928,242.984,82.264,242.768,48.736,263.48z M176.272,263.864C179.032,164.176,206.856,96,232,96s52.968,68.176,55.728,167.864 c-14.424-9.032-30.912-14.184-47.728-15.416V248h-16v0.448C207.192,249.68,190.696,254.832,176.272,263.864z"></path> <path style="fill:#0C3847;" d="M392,344c-17.648,0-32,14.352-32,32s14.352,32,32,32s32-14.352,32-32S409.648,344,392,344z M392,392 c-8.824,0-16-7.176-16-16s7.176-16,16-16s16,7.176,16,16S400.824,392,392,392z"></path> <path style="fill:#0C3847;" d="M280,312v128h224V312H280z M456.448,421.36l-0.92,2.64H328.52l-1.016-2.76 c-4.712-12.832-16.32-24.408-28.864-28.8l-2.64-0.912v-31l2.76-1.016c12.84-4.72,24.408-16.32,28.792-28.864l0.92-2.648h127 l1.016,2.76c4.712,12.832,16.32,24.408,28.864,28.8l2.648,0.912v31l-2.76,1.016C472.4,397.208,460.832,408.816,456.448,421.36z M488,343.312c-6.208-3.04-12.072-8.92-15.272-15.312H488V343.312z M311.312,328c-3.04,6.208-8.92,12.072-15.312,15.272V328 H311.312z M296,408.688c6.208,3.04,12.072,8.92,15.272,15.312H296V408.688z M472.688,424c3.04-6.208,8.92-12.072,15.312-15.272V424 H472.688z"></path> <path style="fill:#0C3847;" d="M136,304c-26.472,0-48,21.528-48,48s21.528,48,48,48s48-21.528,48-48S162.472,304,136,304z M136,384 c-17.648,0-32-14.352-32-32s14.352-32,32-32s32,14.352,32,32S153.648,384,136,384z"></path> <path style="fill:#0C3847;" d="M48,368c-22.056,0-40,17.944-40,40s17.944,40,40,40s40-17.944,40-40S70.056,368,48,368z M48,432 c-13.232,0-24-10.768-24-24s10.768-24,24-24s24,10.768,24,24S61.232,432,48,432z"></path> <path style="fill:#0C3847;" d="M120,440c-17.648,0-32,14.352-32,32s14.352,32,32,32s32-14.352,32-32S137.648,440,120,440z M120,488 c-8.824,0-16-7.176-16-16s7.176-16,16-16s16,7.176,16,16S128.824,488,120,488z"></path> </g> <circle style="fill:#65758C;" cx="392" cy="376" r="16"></circle> </g></svg>          </div>
          <h3 class="fw-bold m-1 fs-2  text-warning"><?= Insurances::find()->count() .' +';?></h3>          <p class=" m-0">Insurances types</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="text-center">
        <div class="d-flex align-items-center justify-content-center  mx-auto " >
        <svg fill="#65758C" viewBox="0 0 24 24" width="55" height="55"  xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M19 9.99611V12L22 9L19 6V7.99376C18.309 7.94885 17.9594 7.6644 17.4402 7.23176L17.4283 7.22188C16.7967 6.6955 15.9622 6 14.4 6C12.8378 6 12.0033 6.69551 11.3717 7.22188L11.3598 7.23178C10.7928 7.70427 10.428 8 9.6 8C8.772 8 8.40717 7.70427 7.84018 7.23178L7.82831 7.22188C7.59036 7.02357 7.32361 6.80126 7 6.60118V9.12312C7.58472 9.56529 8.36495 10 9.6 10C11.1622 10 11.9967 9.30449 12.6283 8.77812L12.6402 8.76822C13.2072 8.29573 13.572 8 14.4 8C15.228 8 15.5928 8.29573 16.1598 8.76821L16.1717 8.77811C16.7758 9.28156 17.5655 9.93973 19 9.99611Z"></path> <path d="M7 17.1231C7.58472 17.5653 8.36495 18 9.6 18C11.1622 18 11.9967 17.3045 12.6283 16.7781L12.6402 16.7682C13.2072 16.2957 13.572 16 14.4 16C15.228 16 15.5928 16.2957 16.1598 16.7682L16.1717 16.7781C16.7758 17.2816 17.5655 17.9397 19 17.9961V20L22 17L19 14V15.9938C18.309 15.9488 17.9594 15.6644 17.4402 15.2318L17.4283 15.2219C16.7967 14.6955 15.9622 14 14.4 14C12.8378 14 12.0033 14.6955 11.3717 15.2219L11.3598 15.2318C10.7928 15.7043 10.428 16 9.6 16C8.772 16 8.40717 15.7043 7.84018 15.2318L7.82831 15.2219C7.59036 15.0236 7.32361 14.8013 7 14.6012V17.1231Z"></path> <path d="M5 4H15V8.03662C15.8985 8.15022 16.5162 8.51098 17 8.87686V4C17 2.89543 16.1046 2 15 2H5C3.89543 2 3 2.89543 3 4V20C3 21.1046 3.89543 22 5 22H15C16.1046 22 17 21.1046 17 20V19.3988C16.6764 19.1987 16.4096 18.9764 16.1717 18.7781L16.1598 18.7682C15.7512 18.4277 15.4476 18.179 15 18.0666V20H5L5 4Z"></path> <path d="M15 16.0366C15.8985 16.1502 16.5162 16.511 17 16.8769V11.3988C16.6764 11.1987 16.4096 10.9764 16.1717 10.7781L16.1598 10.7682C15.7512 10.4277 15.4476 10.179 15 10.0666V16.0366Z"></path> </g></svg>

          </div>
          <h3 class=" fw-bold m-1 fs-2  text-white"><?= Policy::find()->count() .' +';?></h3>
          <p class=" m-0">Policies</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="text-center">
        <div class="d-flex align-items-center justify-content-center  mx-auto " >
        <svg fill="#65758C" width="55" height="55"  viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M8 2L8 6L4 6L4 48L46 48L46 14L30 14L30 6L26 6L26 2 Z M 10 4L24 4L24 8L28 8L28 46L19 46L19 39L15 39L15 46L6 46L6 8L10 8 Z M 10 10L10 12L12 12L12 10 Z M 14 10L14 12L16 12L16 10 Z M 18 10L18 12L20 12L20 10 Z M 22 10L22 12L24 12L24 10 Z M 10 15L10 19L12 19L12 15 Z M 14 15L14 19L16 19L16 15 Z M 18 15L18 19L20 19L20 15 Z M 22 15L22 19L24 19L24 15 Z M 30 16L44 16L44 46L30 46 Z M 32 18L32 20L34 20L34 18 Z M 36 18L36 20L38 20L38 18 Z M 40 18L40 20L42 20L42 18 Z M 10 21L10 25L12 25L12 21 Z M 14 21L14 25L16 25L16 21 Z M 18 21L18 25L20 25L20 21 Z M 22 21L22 25L24 25L24 21 Z M 32 22L32 24L34 24L34 22 Z M 36 22L36 24L38 24L38 22 Z M 40 22L40 24L42 24L42 22 Z M 32 26L32 28L34 28L34 26 Z M 36 26L36 28L38 28L38 26 Z M 40 26L40 28L42 28L42 26 Z M 10 27L10 31L12 31L12 27 Z M 14 27L14 31L16 31L16 27 Z M 18 27L18 31L20 31L20 27 Z M 22 27L22 31L24 31L24 27 Z M 32 30L32 32L34 32L34 30 Z M 36 30L36 32L38 32L38 30 Z M 40 30L40 32L42 32L42 30 Z M 10 33L10 37L12 37L12 33 Z M 14 33L14 37L16 37L16 33 Z M 18 33L18 37L20 37L20 33 Z M 22 33L22 37L24 37L24 33 Z M 32 34L32 36L34 36L34 34 Z M 36 34L36 36L38 36L38 34 Z M 40 34L40 36L42 36L42 34 Z M 32 38L32 40L34 40L34 38 Z M 36 38L36 40L38 40L38 38 Z M 40 38L40 40L42 40L42 38 Z M 10 39L10 44L12 44L12 39 Z M 22 39L22 44L24 44L24 39 Z M 32 42L32 44L34 44L34 42 Z M 36 42L36 44L38 44L38 42 Z M 40 42L40 44L42 44L42 42Z"></path></g></svg>
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