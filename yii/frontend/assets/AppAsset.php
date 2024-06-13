<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets/libs/swiper/swiper-bundle.min.css',
        'assets/libs/glightbox/dist/css/glightbox.min.css',
        'assets/libs/simplebar/dist/simplebar.min.css',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
        'assets/libs/scrollcue/scrollCue.css',
        'assets/fonts/css/boxicons.min.css',
        'assets/css/theme.min.css',
        'assets/css/main.css',
        'assets/css/style.css',
    ];
    public $js = [
        'assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js',
        'assets/libs/simplebar/dist/simplebar.min.js',
        'assets/libs/headhesive/dist/headhesive.min.js',
        'assets/js/theme.min.js',
      'assets/libs/jarallax/dist/jarallax.min.js',
      'assets/js/vendors/jarallax.js',
      'assets/libs/parallax-js/dist/parallax.min.js',
      'assets/js/vendors/parallax.js',
      'assets/libs/swiper/swiper-bundle.min.js',
      'assets/js/vendors/swiper.js',
      'assets/libs/glightbox/dist/js/glightbox.min.js',
      'assets/js/vendors/glight.js',
      'assets/libs/scrollcue/scrollCue.min.js',
      'assets/js/vendors/scrollcue.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
