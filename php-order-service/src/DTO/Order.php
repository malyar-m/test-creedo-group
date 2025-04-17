<?php

namespace App\DTO;

class Order implements \JsonSerializable
{
    public function __construct(
        private string $id,
        private string $productId,
        private int $quantity,
        private float $totalPrice,
        private \DateTimeImmutable $createdAt
    ) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getProductId(): string
    {
        return $this->productId;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'product_id' => $this->productId,
            'quantity' => $this->quantity,
            'total_price' => $this->totalPrice,
            'created_at' => $this->createdAt->format('Y-m-d H:i:s')
        ];
    }
} 