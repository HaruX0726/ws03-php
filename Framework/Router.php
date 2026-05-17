<?php

namespace Framework;   

use App\Controllers\ErrorController;

use Framework\Middleware\Authorize;

class Router
{
    protected $routes = [];

    public function registerRoute($method, $uri, $action, $middleware = [])
    {
        list($controller, $controllerMethod) = explode('@', $action);
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod,
            'middleware' => $middleware
        ];
    }


    public function get($uri, $controller, $middleware = [])
    {
        $this->registerRoute('GET', $uri, $controller, $middleware);
    }


    public function post($uri, $controller, $middleware = [])
    {
        $this->registerRoute('POST', $uri, $controller, $middleware);
    }


    public function put($uri, $controller, $middleware = [])
    {
        $this->registerRoute('PUT', $uri, $controller, $middleware);
    }

    public function delete($uri, $controller, $middleware = [])
    {
        $this->registerRoute('DELETE', $uri, $controller, $middleware);
    }

    public function route($uri)
    {

        $requestMethod = $_SERVER['REQUEST_METHOD'];

        //Check for _method input
        if($requestMethod === 'POST' && isset($_POST['_method'])) {
            //Ovverride the request method with the value of _method
            $requestMethod = strtoupper($_POST['_method']);
        }
        

        foreach ($this->routes as $route) {
        //Splt the current URI into segments
        $uriSegments = explode('/', trim($uri, '/'));

        //Slit the route
        $routeSegments = explode('/', trim($route['uri'], '/'));

        $match = true;

        if(count($uriSegments) === count($routeSegments) && strtoupper($route['method']) === $requestMethod) {
            $params = [];
            
            $match = true;
            
            for($i = 0; $i < count($uriSegments); $i++) {
                // Check for dynamic segments
                if (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
                    // Dynamic segment - capture as a param
                    $params[$matches[1]] = $uriSegments[$i];
                } elseif ($routeSegments[$i] !== $uriSegments[$i]) {
                    // Static segment - must match exactly
                    $match = false;
                    break;
                }
            }
            if ($match) {

            foreach($route['middleware'] as $middleware){
                (new Authorize)->handle($middleware);
            }
                
            $controller = 'App\\Controllers\\'. $route['controller'];
            $controllerMethod = $route['controllerMethod'];

                $controllerInstance = new $controller();
                $controllerInstance->$controllerMethod($params);
                return;
            }   
        }
        }    
        ErrorController::notFound();
    }
}
