<?php

use App\Container;
use App\Controller\OrderController;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container();
$app = AppFactory::createFromContainer($container);

$app->addErrorMiddleware(true, true, true);

$app->post('/orders', [OrderController::class, 'createOrder']);
$app->get('/orders', [OrderController::class, 'getOrders']);

$app->run(); 