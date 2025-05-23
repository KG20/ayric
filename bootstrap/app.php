<?php
// Start session
session_start();

// Load environment variables
// require __DIR__ . '/../vendor/autoload.php';
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
// $dotenv->load();

// Load configuration
$config = require __DIR__ . '/../config/app.php';

// Initialize database (optional for now)
// App\Core\Database::connect($config['database']);