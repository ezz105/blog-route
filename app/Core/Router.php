<?php

namespace App\Core; // Ensure this is correct

use FastRoute;

class Router
{
    private $dispatcher;

    public function __construct()
    {
        $this->dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
            require_once __DIR__ . '/../Routes/web.php'; // Ensure this path is correct
        });
    }

    public function dispatch($httpMethod, $uri)
    {
        $uri = $this->sanitizeUri($uri);
        error_log("HTTP Method: $httpMethod, URI: $uri"); // Debug output
        // var_dump($uri);
        $routeInfo = $this->dispatcher->dispatch($httpMethod, $uri);
        // var_dump($routeInfo);

        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                http_response_code(404);
                echo '404 Not Found';
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                http_response_code(405);
                echo '405 Method Not Allowed';
                break;
            case FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                // Create an instance of PostController
                $controllerInstance = new $handler[0]();
                // Call the method on the instance
                call_user_func_array([$controllerInstance, $handler[1]], $vars);
                break;
        }
    }


    private function sanitizeUri($uri)
    {
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        return rawurldecode($uri);
    }
}
