<?php

use App\Container;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container();
$app = AppFactory::createFromContainer($container);

$app->addErrorMiddleware(true, true, true);

$app->post('/orders', [\App\Controller\OrderController::class, 'createOrder']);
$app->get('/orders', [\App\Controller\OrderController::class, 'getOrders']);

$app->run(); 