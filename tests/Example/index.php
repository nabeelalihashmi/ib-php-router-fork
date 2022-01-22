<?php

require __DIR__ . '/../../vendor/autoload.php';

$params = [
    'paths' => [
        'controllers' => __DIR__ . '/Controllers',
        'middlewares' => __DIR__ . '/Middlewares',
    ],
    'namespaces' => [
        'controllers' => 'Buki\\Tests\\Example\\Controllers',
        'middlewares' => 'Buki\\Tests\\Example\\Middlewares',
    ],
    'base_folder' => __DIR__,
    'main_method' => 'main',
];

$router = new \Buki\Router\Router($params);

$router->get('/', function() {
    return 'Hello World!';
});

$router->get('/test', 'TestController@main');

$router->controller('/controller', 'TestController');

$router->run();
