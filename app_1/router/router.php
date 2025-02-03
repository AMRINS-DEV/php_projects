<?php
class Router
{
    private static $routes = [];

    public static function get($route, $controllerName, $methodName)
    {
        self::$routes['GET'][$route] = array(
            'controller' => $controllerName,
            'method' => $methodName
        );
    }

    public static function post($route, $controllerName, $methodName)
    {
        self::$routes['POST'][$route] = array(
            'controller' => $controllerName,
            'method' => $methodName
        );
    }

    public static function handleRequest($uri, $method)
    {
        if (isset(self::$routes[$method])) {
            foreach (self::$routes[$method] as $route => $handler) {
                if ($route === $uri) {
                    self::callController($handler['controller'], $handler['method']);
                    return;
                }
            }
        }
        self::notFound();
    }

    private static function callController($controllerName, $methodName)
    {
        include_once './controllers/' . $controllerName . '.php';

        // Check if the controller class exists
        if (class_exists($controllerName)) {
            $controllerInstance = new $controllerName();

            // Check if the method exists in the controller class
            if (method_exists($controllerInstance, $methodName)) {
                $controllerInstance->$methodName();
                exit;
                return;
            }
        }

        self::notFound();
    }

    private static function notFound()
    {
        include "./404.php";
        exit;
    }
}
