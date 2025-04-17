import { FastifyRequest, FastifyReply } from 'fastify';
import { ProductService } from '../services/product.service';

const productService = new ProductService();

export const getAllProducts = async (_request: FastifyRequest, reply: FastifyReply) => {
  try {
    const products = await productService.getAllProducts();
    reply.send(products);
  } catch (error) {
    reply.status(500).send({ error: 'Internal Server Error' });
  }
};

export const getProduct = async (request: FastifyRequest<{ Params: { id: string } }>, reply: FastifyReply) => {
  try {
    const { id } = request.params;
    const product = await productService.getProduct(id);
    
    if (!product) {
      reply.status(404).send({ error: 'Product not found' });
      return;
    }
    
    reply.send(product);
  } catch (error) {
    reply.status(500).send({ error: 'Internal Server Error' });
  }
};
