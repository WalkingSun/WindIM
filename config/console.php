<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

defined('SWOOLE_PROCESS') or define('SWOOLE_PROCESS', 1);
defined('SWOOLE_TCP') or define('SWOOLE_TCP', 1);

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
    'controllerMap'=>[
        'swoole' => [
            'class' => 'feehi\console\SwooleController',
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
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
