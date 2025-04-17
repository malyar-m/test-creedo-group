<?php

namespace App\HttpClient;

use App\DTO\Product;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ProductClient
{
    private $client;
    private $baseUrl;

    public function __construct(string $baseUrl)
    {
        $this->client = new Client();
        $this->baseUrl = $baseUrl;
    }

    public function getProduct(string $id): ?Product
    {
        try {
            $response = $this->client->get("{$this->baseUrl}/products/{$id}");
            $data = json_decode($response->getBody()->getContents(), true);
            
            if (!$data) {
                return null;
            }

            return new Product($data['id'], $data['name'], $data['price']);
        } catch (GuzzleException $e) {
            return null;
        }
    }
} 