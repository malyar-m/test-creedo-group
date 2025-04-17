import { getProducts, getProductById, Product } from '../data/products';

export class ProductService {
  async getAllProducts(): Promise<Product[]> {
    return getProducts();
  }

  async getProduct(id: string): Promise<Product | undefined> {
    return getProductById(id);
  }
}
