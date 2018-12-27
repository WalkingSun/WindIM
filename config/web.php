<?php
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

defined('SWOOLE_PROCESS') or define('SWOOLE_PROCESS', 1);
defined('SWOOLE_TCP') or define('SWOOLE_TCP', 1);

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'GLSjVPOYPzuGsvS3jWJcU5PIzdWdpTxv',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'controllerMap'=>[
        'swoole' => [
//            'class' => 'feehi\console\SwooleController',
//            'class' => 'feehi\console\SwoolewsController',
            'class' => 'app\commands\SwoolewsController',
            'rootDir' =>   str_replace('config', '', __DIR__ ),//yii2项目根路径
            'type' => 'basic',//yii2项目类型，默认为advanced。此处还可以为basic
            'app' => '',//app目录地址,如果type为basic，这里一般为空
            'host' => '0.0.0.0',//监听地址
            'port' => 9501,//监听端口
            'web' => 'web',//默认为web。rootDir app web目的是拼接yii2的根目录，如果你的应用为basic，那么app为空即可。
            'debug' => true,//默认开启debug，上线应置为false
            'env' => 'dev',//默认为dev，上线应置为prod
            'swooleConfig' => [//标准的swoole配置项都可以再此加入
                'reactor_num' => 2,
                'worker_num' => 4,
                'daemonize' => false,
                'log_file' => __DIR__ . '/../runtime/logs/swoole.log',
                'log_level' => 0,
                'pid_file' => __DIR__ . '/../runtime/server.pid',
            ],
        ]
    ],
    'params' => $params,
    ];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;