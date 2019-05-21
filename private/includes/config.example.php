<?php

$config = [
    'DB_HOST' => 'localhost',
    'DB_NAME' => 'myband',
    'DB_USER' => 'root',
    'DB_PASSWORD' => '',
    'ROOT' => dirname(dirname(__DIR__)),
    'PRIVATE' => dirname(__DIR__) . '/private',
    'WEBROOT' => dirname(__DIR__) . '/public',
];

return $config;
