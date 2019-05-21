<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    // set target language to be Indonesia
    'language' => 'id-ID',
      // set source language to be English
  'sourceLanguage' => 'en-US',
  'as access' => [
    'class' => '\hscstudio\mimin\components\AccessControl',
    'allowActions' => [
       // add wildcard allowed action here!
       'gii/*',
   // 'site/*',
       'debug/*',
      'mimin/*', // only in dev modewuw
     //  'queue/*',
   ],
],

'modules' => [
    'mimin' => [
        'class' => '\hscstudio\mimin\Module',
    ],
],

    'bootstrap' => ['log'],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // only support DbManager
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation

            'cookieValidationKey' => 'y2B_PhmMeo1G4hPY0dO7KfNled31dl6L',
          //  'csrfParam' => '_csrf',
            'enableCsrfValidation' => false,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
         //   'class' => 'app\models\BaseUser',
            //'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [],
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
        'db' => require(__DIR__ . '/db.php'),
        'db_siakad' => require(__DIR__ . '/db_siakad.php'),

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
