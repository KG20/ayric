<?php
// Start session
session_start();

// Load configuration
$config = require __DIR__ . '/../config/app.php';

// Initialize database connection
App\Database::connect($config['database']);

// Helper functions
require __DIR__ . '/../app/helpers/http.php';
