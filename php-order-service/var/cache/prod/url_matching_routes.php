<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/orders' => [
            [['_route' => 'orders', '_controller' => 'App\\Controller\\OrderController::getOrders'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'create_order', '_controller' => 'App\\Controller\\OrderController::createOrder'], null, ['POST' => 0], null, false, false, null],
        ],
    ],
    [ // $regexpList
    ],
    [ // $dynamicRoutes
    ],
    null, // $checkCondition
];
