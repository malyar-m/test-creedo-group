<?php

namespace App;

use App\Controller\OrderController;
use App\HttpClient\ProductClient;
use App\Service\OrderService;
use App\Storage\OrderStorage;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $services = [];

    public function __construct()
    {
        $this->services[ProductClient::class] = function () {
            return new ProductClient(
                getenv('PRODUCT_SERVICE_URL')
            );
        };

        $this->services[OrderStorage::class] = function () {
            return new OrderStorage();
        };

        $this->services[OrderService::class] = function () {
            return new OrderService(
                $this->get(ProductClient::class),
                $this->get(OrderStorage::class)
            );
        };

        $this->services[OrderController::class] = function () {
            return new OrderController(
                $this->get(OrderService::class)
            );
        };
    }

    public function get(string $id)
    {
        if (!isset($this->services[$id])) {
            throw new \RuntimeException("Service {$id} not found");
        }

        if (is_callable($this->services[$id])) {
            $this->services[$id] = $this->services[$id]($this);
        }

        return $this->services[$id];
    }

    public function has(string $id): bool
    {
        return isset($this->services[$id]);
    }
} 