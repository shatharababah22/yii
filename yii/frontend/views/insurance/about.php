<?php

/** @var yii\web\View $this */
/** @var \common\models\Policy[] $policies */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;
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
          <div class="d-flex align-items-center justify-content-center  mx-auto bsb-circle" >
          <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55"  fill="currentColor" class="bi bi-activity  text-white" viewBox="0 0 16 16">
          <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
            </svg>
          </div>
          <h3 class=" fs-2 fw-bold m-1 text-warning">120K</h3>
          <p class=" m-0">Happy Customers</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="text-center">
          <div class="d-flex align-items-center justify-content-center  mx-auto bsb-circle " >
            <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55"  fill="currentColor" class="bi bi-activity  text-white" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z" />
            </svg>
          </div>
          <h3 class="fw-bold m-1 fs-2  text-warning">120K</h3>          <p class=" m-0">Issues Solved</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="text-center">
        <div class="d-flex align-items-center justify-content-center  mx-auto bsb-circle" >
        <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55"  fill="currentColor" class="bi bi-activity  text-white" viewBox="0 0 16 16">
        <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z" />
            </svg>
          </div>
          <h3 class=" fw-bold m-1 fs-2  text-warning">250K</h3>
          <p class=" m-0">Finished Projects</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="text-center">
        <div class="d-flex align-items-center justify-content-center  mx-auto bsb-circle" >
        <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55"  fill="currentColor" class="bi bi-activity  text-white" viewBox="0 0 16 16">
        <path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z" />
              <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z" />
            </svg>
          </div>
          <h3 class=" fw-bold m-1 fs-2  text-warning">786+</h3>
          <p class=" m-0">Awwwards Winning</p>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="why-choose-us active my-xl-9 my-5">

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
        </div>
    <div class="container">
      <div class="row">
 
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-3">
              <div class="feature-box mt-2">
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
              <div class="feature-box">
                <div class="feature-box-content text-center">
                 <div class="fbc-btn mb-3">
                  <i class="fas fa-handshake fs-4"></i>
                  </div>
                  <h5 class="fw-bold">Trusted Partnerships</h5>
                  <p class="fs-5">Collaborating with top providers to ensure reliable, trusted coverage.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="feature-box">
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
              <div class="feature-box">
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