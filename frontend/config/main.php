<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php'),
    require(__DIR__ . '/../template/TConfig.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
//    'catchAll'=>['site/test'],
//    'as urlFilter' => [
//        'class' => 'frontend\service\ActionUrlFilter',
//    ],
//    'on beforeRequest' => function ($event) {
//        echo "<pre>";
//        print_r($event);exit();
//    },
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
                        '/<url:.*>' => 'site/all-page',
                ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],

    'params' => $params,
];
