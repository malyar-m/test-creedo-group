<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Storage\Database;

try {
    Database::initDatabase();
    echo "Database initialized successfully!\n";
} catch (\Exception $e) {
    echo "Error initializing database: " . $e->getMessage() . "\n";
    exit(1);
} 