# Product Service

A Node.js service for managing products, built with Fastify and TypeScript.

## Features

- RESTful API for product management
- MySQL 8.2 database integration
- TypeScript for type safety
- Fastify for high-performance HTTP server

## Prerequisites

- Node.js 18+
- Docker and Docker Compose
- MySQL 8.2

## Quick Start

1. Install dependencies:
```bash
npm install
```

2. Start the service with Docker:
```bash
docker-compose up --build
```

The service will be available at http://localhost:8080

## Development

1. Install dependencies:
```bash
npm install
```

2. Start the development server:
```bash
npm run dev
```

## API Endpoints

- `GET /products` - List all products
- `GET /products/:id` - Get product details
- `POST /products` - Create a new product

Example request to create a product:
```bash
curl -X POST http://localhost:8080/products \
  -H "Content-Type: application/json" \
  -d '{"name": "Test Product", "price": 99.99}'
```

## Testing

Run tests:
```bash
npm test
```

## Environment Variables

- `DB_HOST`: MySQL host (default: localhost)
- `DB_USER`: MySQL user (default: root)
- `DB_PASSWORD`: MySQL password (default: secret)
- `DB_NAME`: Database name (default: product_service)
