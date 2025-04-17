<?php

namespace App\Storage;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;

class Database
{
    private static ?Connection $connection = null;

    public static function getConnection(): Connection
    {
        if (self::$connection === null) {
            $connectionParams = [
                'dbname' => getenv('DB_NAME') ?: 'order_service',
                'user' => getenv('DB_USER') ?: 'root',
                'password' => getenv('DB_PASSWORD') ?: 'root',
                'host' => getenv('DB_HOST') ?: 'mysql-order',
                'driver' => 'pdo_mysql',
            ];

            try {
                self::$connection = DriverManager::getConnection($connectionParams);
            } catch (\Exception $e) {
                throw new \RuntimeException('Failed to connect to database');
            }
        }

        return self::$connection;
    }

    public static function initDatabase(): void
    {
        $conn = self::getConnection();
        
        $sql = "CREATE TABLE IF NOT EXISTS orders (
            id VARCHAR(36) PRIMARY KEY,
            product_id VARCHAR(36) NOT NULL,
            quantity INT NOT NULL,
            total_price DECIMAL(10,2) NOT NULL,
            created_at DATETIME NOT NULL
        )";

        try {
            $conn->executeQuery($sql);
        } catch (\Exception $e) {
            throw new \RuntimeException('Failed to initialize database');
        }
    }
} 