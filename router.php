<?php

class Router 
{
    protected $routes = [];
    public function path($method, $uri, $handler) 
    {
        $uri = preg_replace('#\{(.*?)\}#', '([^\/]+)', $uri);
        $this->routes[] = [$method, "#^$uri$#", $handler];   
    }

    public function get($uri, $handler) 
    {
        $this::path("GET",$uri,$handler);
    }
    public function post($uri, $handler) 
    {
        $this::path("POST",$uri,$handler);
    }

    public function handleRequest() 
    {
        
        $REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
        $REQUEST_URI = $_SERVER['REQUEST_URI'];
        
        
        
        foreach ($this->routes as $route) 
        {
            [$method, $uri, $handler] = $route;
            if ($method !== $REQUEST_METHOD) continue;
            if (preg_match($uri, $REQUEST_URI, $matches)) 
            {
                array_shift($matches);
                return call_user_func_array($handler, $matches);
            }
        }

        echo "URI : " .$REQUEST_URI . " 404 Not Found";
    }
}

