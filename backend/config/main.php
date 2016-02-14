<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'user' => [
            'identityClass' => 'backend\models\User',
            'enableAutoLogin' => true,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' =>false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.sohu.com',  //每种邮箱的host配置不一样
                'username' => 'yali114@sohu.com',
                'password' => 'GXD100688yx',
                'port' => '25',
                //'encryption' => 'tls',

            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['yali114@sohu.com'=>'admin']
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logVars' => [],
                    'logFile'=>'@backend/runtime/logs/error/error.log',
                    //'maxFileSize' => 2,
                    //'maxLogFiles' => 2,
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'categories' => ['operations'],
                    'logVars' => [],
                    'logFile'=>'@backend/runtime/logs/operations.log',
                    'maxFileSize' => 1024*5,
                    'maxLogFiles' => 100,
                ],
                [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\DbTarget',
                    'categories' => ['operations'],
                    'logVars' => [],
                    'logTable'=>'operations_log'
                ],
//                [
//                    'class' => 'yii\log\EmailTarget',
//                    'levels' => ['error'],
//                    'message' => [
//                        'to' => ['yali114@sina.com'],
//                        'subject' => 'Database errors at example.com',
//                    ],
//                ],
            ],
            'flushInterval' => 1,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                        'app/log' => 'app/log.php',
                    ],
                ],
            ],
        ],
    ],
    'language'=>'zh-CN',
    'params' => $params,
];
