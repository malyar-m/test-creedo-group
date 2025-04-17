<?php

namespace App\Storage;

use App\DTO\Order;
use Doctrine\DBAL\Exception;

class OrderStorage
{
    public function save(Order $order): void
    {
        try {
            $conn = Database::getConnection();
            $conn->insert('orders', [
                'id' => $order->getId(),
                'product_id' => $order->getProductId(),
                'quantity' => $order->getQuantity(),
                'total_price' => $order->getTotalPrice(),
                'created_at' => $order->getCreatedAt()->format('Y-m-d H:i:s')
            ]);
        } catch (Exception $e) {
            throw new \RuntimeException('Failed to save order');
        }
    }

    public function findAll(): array
    {
        try {
            $conn = Database::getConnection();
            $stmt = $conn->query('SELECT * FROM orders');
            $orders = [];
            
            while ($row = $stmt->fetchAssociative()) {
                $orders[] = new Order(
                    $row['id'],
                    $row['product_id'],
                    $row['quantity'],
                    $row['total_price'],
                    new \DateTimeImmutable($row['created_at'])
                );
            }
            
            return $orders;
        } catch (Exception $e) {
            throw new \RuntimeException('Failed to fetch orders');
        }
    }
} 