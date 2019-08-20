<?php

$params = require __DIR__ . '/params.php';
$db = file_exists( __DIR__ . '/db_local.php') ?
    (require __DIR__ . '/db_local.php') :
    (require __DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'auths' => [
            'class' => 'app\modules\auth\Module',
        ],
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'main'
        ],
    ],
    'components' => [
        'rbac' => ['class' => \app\components\RbacComponent::class],
        'authManager' => ['class' => \yii\rbac\DbManager::class],
        'auth'=>['class' => \app\components\AuthComponent::class],
        'dao' => ['class' => \app\components\DaoComponent::class],
        'activity' => ['class' => \app\components\ActivityComponent::class, 'classEntity' => \app\models\Activity::class],
        'day' => ['class' => \app\components\DayComponent::class, 'classEntity' => \app\models\Day::class],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'x6EIOpTe-NxK-Gb-F5VZk5EqA-mXdTxo',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
            //'class' => 'yii\caching\MemCache',
            //            'useMemcached' => true,
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'i18n'=>[
            'translations' => [
                'app*'=>[
                    'class'=>\yii\i18n\PhpMessageSource::class,
                    'fileMap' => [
                        'app'=>'app.php'
                    ]
                ]
            ]
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'event/<action>' => 'activity/<action>',
                '<controller>/<action>/<id:\w+>' => '<controller>/<action>',
                '<controller>/<action>' => '<controller>/<action>',

            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
}

return $config;
