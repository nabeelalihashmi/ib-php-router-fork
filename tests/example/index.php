<?php

require __DIR__ . '/../../vendor/autoload.php';

$params = [
    'paths' => [
        'Controllers' => 'Controllers',
        'middlewares' => 'Middlewares',
    ],
    'namespaces' => [
        'Controllers' => 'Controllers\\',
        'middlewares' => 'Middlewares\\',
    ],
    'base_folder' => __DIR__,
    'main_method' => 'main',
];

$router = new \Buki\Router\Router($params);

$router->get('/', function() {
    return 'Hello World!';
});

$router->get('/controller', 'TestController@main');

$router->run();
