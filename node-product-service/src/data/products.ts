import { v4 as uuidv4 } from 'uuid';
import pool from '../config/database';

export interface Product {
  id: string;
  name: string;
  price: number;
}

export const getProducts = async (): Promise<Product[]> => {
  const [rows] = await pool.execute('SELECT * FROM products');
  return rows as Product[];
};

export const getProductById = async (id: string): Promise<Product | undefined> => {
  const [rows] = await pool.execute('SELECT * FROM products WHERE id = ?', [id]);
  const products = rows as Product[];
  return products[0];
};

export const createProduct = async (name: string, price: number): Promise<Product> => {
  const id = uuidv4();
  await pool.execute(
    'INSERT INTO products (id, name, price) VALUES (?, ?, ?)',
    [id, name, price]
  );
  return { id, name, price };
};

// Initialize database schema
export const initDatabase = async (): Promise<void> => {
  await pool.execute(`
    CREATE TABLE IF NOT EXISTS products (
      id VARCHAR(36) PRIMARY KEY,
      name VARCHAR(255) NOT NULL,
      price DECIMAL(10,2) NOT NULL
    )
  `);

  // Insert sample data if table is empty
  const [rows] = await pool.execute('SELECT COUNT(*) as count FROM products');
  if ((rows as any)[0].count === 0) {
    await createProduct('Product 1', 10.99);
    await createProduct('Product 2', 20.99);
    await createProduct('Product 3', 30.99);
    await createProduct('Product 4', 59.99);
    await createProduct('Product 5', 109.99);
  }
};
