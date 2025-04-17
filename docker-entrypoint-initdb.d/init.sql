CREATE DATABASE IF NOT EXISTS product_service;
CREATE DATABASE IF NOT EXISTS order_service;

-- Set password for existing root users
SET PASSWORD FOR 'root'@'localhost' = 'root';
SET PASSWORD FOR 'root'@'%' = 'root';

-- Grant privileges
GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%';
FLUSH PRIVILEGES; 