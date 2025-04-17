<?php

namespace App\Service;

use App\DTO\Order;
use App\DTO\Product;
use App\HttpClient\ProductClient;
use App\Storage\OrderStorage;
use Ramsey\Uuid\Uuid;

class OrderService
{
    private $productClient;
    private $orderStorage;

    public function __construct(ProductClient $productClient, OrderStorage $orderStorage)
    {
        $this->productClient = $productClient;
        $this->orderStorage = $orderStorage;
    }

    public function createOrder(string $productId, int $quantity): Order
    {
        $product = $this->productClient->getProduct($productId);
        if (!$product) {
            throw new \RuntimeException('Product not found');
        }

        $totalPrice = $product->getPrice() * $quantity;
        $order = new Order(
            Uuid::uuid4()->toString(),
            $productId,
            $quantity,
            $totalPrice,
            new \DateTimeImmutable()
        );

        $this->orderStorage->save($order);
        return $order;
    }

    public function getOrders(): array
    {
        return $this->orderStorage->findAll();
    }
} 