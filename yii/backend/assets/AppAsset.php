<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
   'css/theme.min.css'
   ,'vendor/bootstrap-icons/font/bootstrap-icons.css',
   'vendor/daterangepicker/daterangepicker.css',
   'vendor/tom-select/dist/css/tom-select.bootstrap5.css',
//    'css/theme-dark.min.css'
    ];
    public $js = [
        'js/hs.theme-appearance.js',
        'vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js',
        'vendor/jquery/dist/jquery.min.js',
        'vendor/jquery-migrate/dist/jquery-migrate.min.js',
        'vendor/bootstrap/dist/js/bootstrap.bundle.min.js',
        'vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js',
        'vendor/hs-form-search/dist/hs-form-search.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
