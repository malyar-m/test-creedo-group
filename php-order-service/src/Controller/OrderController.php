<?php

namespace App\Controller;

use App\Service\OrderService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Psr7\Response as SlimResponse;

class OrderController
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function createOrder(Request $request, Response $response): Response
    {
        $data = json_decode($request->getBody()->getContents(), true);
        
        if (!isset($data['product_id']) || !isset($data['quantity'])) {
            $response = new SlimResponse();
            $response->getBody()->write(json_encode(['error' => 'Missing required fields']));
            return $response->withStatus(400)->withHeader('Content-Type', 'application/json');
        }

        try {
            $order = $this->orderService->createOrder($data['product_id'], $data['quantity']);
            $response = new SlimResponse();
            $response->getBody()->write(json_encode($order));
            return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
        } catch (\RuntimeException $e) {
            $response = new SlimResponse();
            $response->getBody()->write(json_encode(['error' => $e->getMessage()]));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
    }

    public function getOrders(Request $request, Response $response): Response
    {
        $orders = $this->orderService->getOrders();
        $response = new SlimResponse();
        $response->getBody()->write(json_encode($orders));
        return $response->withHeader('Content-Type', 'application/json');
    }
} 