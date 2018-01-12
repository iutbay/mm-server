<?php

$config = [
    'id' => 'mm-server',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'api/<action>' => 'mm/api/<action>',
                'thumbs/<path:.*>' => 'mm/thumb/thumb',
            ],
        ],
        'fs' => [
            'class' => 'creocoder\flysystem\LocalFilesystem',
            'path' => '@webroot/upload',
        ],
    ],
    'modules' => [
        'mm' => [
            'class' => 'iutbay\yii2\mm\Module',
//            'fsComponent' => 'fs',
//            'apiOptions' => [
//                'cors' => [
//                    'Origin' => ['*'],
//                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
//                    'Access-Control-Request-Headers' => ['*'],
//                    'Access-Control-Allow-Credentials' => null,
//                    'Access-Control-Max-Age' => 86400,
//                    'Access-Control-Expose-Headers' => [],
//                ],
//            ]
//            'thumbsPath' => '@webroot/thumbs',
//            'thumbsUrl' => '@web/thumbs',
//            'thumbsSize' => [150, 150],
        ],
    ],
];
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}
return $config;
