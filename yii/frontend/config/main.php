<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','queue'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'reCaptcha' => [
                'class' => 'himiklab\yii2\recaptcha\ReCaptchaConfig',
                'siteKey' => '6LfutA8qAAAAAEbLnOcFLoc_K_sxlTxwTfoEr1Yp',
                'secretV3' => '6LfutA8qAAAAAE-Vh475F2Jf60KM8Wgrkqtmu-z9',
            ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],

        'queue' => [
            'class' => 'yii\queue\db\Queue', 
            'db' => 'db', 
            'tableName' => '{{%queue}}', 
            'channel' => 'default', 
            'mutex' => 'yii\mutex\MysqlMutex', 
        ],
        'session' => [
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
  
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'insurances' => 'insurance/type',
                // 'insurance/<slug:\w+>' => 'insurance/type/<slug:\w+>',
                // 'insurance/<slug:\w+>' => 'insurance/programs',

            ],
        ],

    ],
    'params' => $params,
];
