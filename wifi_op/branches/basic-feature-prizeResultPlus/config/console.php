<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');



$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');
$userdb = require(__DIR__ . '/userdb.php');
$eladiesdb = require(__DIR__ . '/eladiesdb.php');
$wifievent = require(__DIR__ . '/wifievent.php');

return [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'app\commands',
    'modules' => [
        'gii' => 'yii\gii\Module',
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
        'userdb' => $userdb,
        'eladiesdb' => $eladiesdb,
        'TAuthManager' => [
            'class' => 'app\components\TAuthManager',
            'defaultRoles' => ['guest'],
        ],
    ],
    'params' => $params,
];
