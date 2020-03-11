<?php 
namespace Core;

class Router {
    private static $routes;
    public static function connect ($url, $route) {
        $route['controller'] = 'Controller\\' . ucfirst($route['controller']) . 'Controller';  
        $route['action'] = ucfirst($route['action']) . 'Action';
        self::$routes[$url] = $route;
        //var_dump($route);
    }
    
    public static function get () {
        $uri = $_SERVER['REQUEST_URI'];
        $ur = substr($uri, strlen(BASE_URI));
        return self::$routes[$ur];
    }
}