<?php

class Router
{

    protected $routes = [
        'GET'  => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callFunction(...explode('@', $this->routes[$requestType][$uri]));
        }
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function callFunction($controller, $func)
    {
        $controller = new $controller();

        if ( ! method_exists($controller, $func)) {
            throw new Exception("$controller does not have $func");
        }

        return $controller->$func();
    }

    public function home()
    {
        return header('Location: localhost:8000');
    }
}