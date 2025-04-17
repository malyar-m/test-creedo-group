<?php

namespace App\DTO;

class Order
{
    public function __construct(
        public string $id,
        public string $productId,
        public int $quantity,
        public float $totalPrice,
        public \DateTimeImmutable $createdAt
    ) {}
} 