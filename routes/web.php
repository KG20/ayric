<?php

use App\Controllers\HomeController;

$router->get('/', [HomeController::class, 'index']);
$router->get('/test', function () {
    echo "Route test successful!";
});
