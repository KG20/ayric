<?php
return [
    'database' => [
        'driver' => 'pgsql',
        'host' => $_ENV['DB_HOST'],
        'database' => $_ENV['DB_NAME'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'],
        'charset' => 'utf8',
    ],
    'app' => [
        'name' => 'Ayric',
        'url' => $_ENV['APP_URL'] ?? 'http://localhost:8000'
    ]

];
