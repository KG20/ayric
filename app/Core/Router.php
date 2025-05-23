<?php

namespace App\Core;

class Router
{
    // Stores all routes as ['GET' => ['/' => Handler], 'POST' => [...]]
    protected $routes = [];

    // Register GET route
    public function get($uri, $handler)
    {
        $this->routes['GET'][$uri] = $handler;
        // Example: $router->get('/') stores:
        // $this->routes['GET']['/'] = [HomeController::class, 'index']
    }

    // Register POST route (same pattern)
    public function post($uri, $handler)
    {
        $this->routes['POST'][$uri] = $handler;
    }

    // Handle incoming request
    public function dispatch()
    {
        // Get HTTP method (GET/POST)
        $method = $_SERVER['REQUEST_METHOD'];

        // Get URL path (ignores query strings)
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Check if route exists
        if (isset($this->routes[$method][$path])) {
            $handler = $this->routes[$method][$path];

            // Handle closure routes like $router->get('/', fn() => ...);
            if (is_callable($handler)) return $handler();

            // Handle "Controller@method" strings
            if (is_string($handler)) {
                [$controller, $method] = explode('@', $handler);
                $controller = "App\\Controllers\\{$controller}";
                return (new $controller)->$method();
            }

            // Handle [Controller::class, 'method'] arrays
            if (is_array($handler)) {
                [$controller, $method] = $handler;
                return (new $controller)->$method();
            }
        }

        // 404 - No matching route
        http_response_code(404);
        require __DIR__ . '/../../resources/views/errors/404.php';
    }
}
