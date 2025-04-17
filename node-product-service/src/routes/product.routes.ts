import { FastifyInstance } from 'fastify';
import { getAllProducts, getProduct } from '../controllers/product.controller';

export const productRoutes = async (fastify: FastifyInstance) => {
  fastify.get('/products', getAllProducts);
  fastify.get('/products/:id', getProduct);
};
