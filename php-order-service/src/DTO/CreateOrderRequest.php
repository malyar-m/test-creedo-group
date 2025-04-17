<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class CreateOrderRequest
{
    #[Assert\NotBlank]
    #[Assert\Uuid]
    public string $productId;

    #[Assert\NotBlank]
    #[Assert\Positive]
    public int $quantity;
} 