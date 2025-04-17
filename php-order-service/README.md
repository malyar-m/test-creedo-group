# Order Service

A PHP service for managing orders, built with Symfony MicroKernel.

## Features

- RESTful API for order management
- MySQL 8.2 database integration
- Symfony MicroKernel for lightweight framework
- Integration with Product Service

## Prerequisites

- PHP 8.2+
- Composer
- Docker and Docker Compose
- MySQL 8.2

## Quick Start

1. Install dependencies:
```bash
composer install
```

2. Start the service with Docker:
```bash
docker-compose up --build
```

The service will be available at http://localhost:8081

## Development

1. Install dependencies:
```bash
composer install
```

2. Start the development server:
```bash
php -S localhost:8081 -t public
```

## API Endpoints

- `GET /orders` - List all orders
- `POST /orders` - Create a new order

Example request to create an order:
```bash
curl -X POST http://localhost:8081/orders \
  -H "Content-Type: application/json" \
  -d '{"productId": "1", "quantity": 2}'
```

## Testing

Run tests:
```bash
./vendor/bin/phpunit
```

## Environment Variables

- `PRODUCT_SERVICE_URL`: URL of the Product Service (default: http://product-service:8080)
- `DB_HOST`: MySQL host (default: mysql-order)
- `DB_USER`: MySQL user (default: root)
- `DB_PASSWORD`: MySQL password (default: root)
- `DB_NAME`: Database name (default: order_service) 