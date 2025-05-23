<?php
// public/index.php
require __DIR__ . '/../bootstrap/app.php';
$router = new App\Core\Router();
require __DIR__ . '/../routes/web.php';
$router->dispatch();
