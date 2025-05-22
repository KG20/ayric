<?php
// Load dependencies
require __DIR__ . '/../vendor/autoload.php';

// Initialize application
require __DIR__ . '/../bootstrap/app.php';

// Handle the request
$router = new App\Router();
require __DIR__ . '/../routes/web.php';
$router->dispatch();
