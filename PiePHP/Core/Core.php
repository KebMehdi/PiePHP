<?php
namespace Core;
use Core\Router;
class Core {
    public function run() {
        require 'src/routes.php';
        $route = Router::get();

        $class = $route['controller'];
        $method = $route['action'];

        $controller = new $class;
        $controller->$method();
        //echo __CLASS__ . " [OK]" . PHP_EOL;
    }
}
