<?php

date_default_timezone_set("UTC");
define('DS', DIRECTORY_SEPARATOR);

$config = [
    'home_page' => 'https://instagram.com/',
    'timeout' => 5,
    // Set the value to be false on server.
    'use_proxy' => false,
    'proxy' => [
        'type' => 'socks5',
        'url' => '127.0.0.1:1080',
    ],
    'db_input' => [
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'instagram',
        'table' => 'user',
        'column' => 'user_name',
        'username' => 'root',
        'password' => '',
    ],
    'db_output' => [
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'instagram',
        'table' => 'image',
        'column' => 'url',
        'username' => 'root',
        'password' => '',
    ]
];


return $config;