<?php

// $this 는 new class 선언한 instance 대상
// self 는 class 대상
class Router 
{
    static $routes = [];
    static function path($method, $uri, $handler) 
    {
        $uri = preg_replace('#\{(.*?)\}#', '([^\/]+)', $uri);
        self::$routes[] = [$method, "#^$uri$#", $handler];   

    }

    static function handleRequest() 
    {
        
        $REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
        $REQUEST_URI = $_SERVER['REQUEST_URI'];
        
        
        
        foreach (self::$routes as $route) 
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


function GET($uri,$handler){
    Router::path('GET',$uri,$handler);
}
function POST($uri,$handler){
    Router::path('POST',$uri,$handler);
}