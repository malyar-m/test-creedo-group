import fastify from 'fastify';
import { productRoutes } from './routes/product.routes';
import { initDatabase } from './data/products';

const server = fastify({
  logger: true
});

// Initialize database
initDatabase().catch(err => {
  console.error('Failed to initialize database:', err);
  process.exit(1);
});

// Register routes
server.register(productRoutes);

const start = async () => {
  try {
    await server.listen({ port: 8080, host: '0.0.0.0' });
    console.log('Server is running on http://localhost:8080');
  } catch (err) {
    server.log.error(err);
    process.exit(1);
  }
};

start();
