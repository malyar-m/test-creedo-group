# Microservices Architecture with Node.js and PHP

This project demonstrates a microservices architecture using Node.js and PHP, with MySQL databases for each service.

## Architecture

- **Product Service**: Node.js service handling product management
- **Order Service**: PHP service handling order management
- **Databases**: MySQL 8.2 for each service

## Services

### Product Service (Node.js)
- Port: 8080
- Database: MySQL 8.2 (port 3306)
- API Endpoints:
  - GET /products
  - GET /products/:id
  - POST /products

### Order Service (PHP)
- Port: 8081
- Database: MySQL 8.2 (port 3307)
- API Endpoints:
  - GET /orders
  - POST /orders

## Prerequisites

- Docker and Docker Compose
- Node.js 18+ (for local development)
- PHP 8.2+ (for local development)
- Composer (for PHP dependencies)

## Quick Start

1. Clone the repository:
```bash
git clone <repository-url>
cd <repository-name>
```

2. Start all services:
```bash
docker-compose up --build
```

The services will be available at:
- Product Service: http://localhost:8080
- Order Service: http://localhost:8081

## Development

### Product Service (Node.js)
```bash
cd node-product-service
npm install
npm run dev
```

### Order Service (PHP)
```bash
cd php-order-service
composer install
php -S localhost:8081 -t public
```

## API Documentation

### Product Service
- `GET /products` - List all products
- `GET /products/:id` - Get product details
- `POST /products` - Create a new product

### Order Service
- `GET /orders` - List all orders
- `POST /orders` - Create a new order

## Testing

Run tests for each service:
```bash
# Product Service
cd node-product-service
npm test

# Order Service
cd php-order-service
./vendor/bin/phpunit
``` 