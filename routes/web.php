<?php

use App\Http\Controllers\HomeController;

$router->get('/', [HomeController::class, 'index']);
$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@handleLogin');

// 404 Handler
$router->set404(function () {
    require resource_path('views/errors/404.php');
});
