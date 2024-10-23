<?php

require_once '../vendor/autoload.php'; // This should point to your vendor/autoload.php

use App\Core\Router;

// Get HTTP request
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Dispatch using FastRoute
$router = new Router();
$router->dispatch($httpMethod, $uri);
