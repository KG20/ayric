<?php
// public/index.php
require __DIR__ . '/../bootstrap/app.php';
$router = new app\Core\Router();
require __DIR__ . '/../routes/web.php';
$router->dispatch();
