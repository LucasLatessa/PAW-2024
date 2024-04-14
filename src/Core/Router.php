<?php

namespace Paw\Core;
use Paw\Core\Exceptions\RouteNotFoundException;

class Router
{
    public array $routes;
    public function loadRoutes($path,$action)
    {
        $this->routes[$path] = $action;
    }

    public function direct($path)
    {
        #print_r($this->routes);
        #print_r($path);
        if (!array_key_exists($path,$this->routes)){
            print_r($path);
            throw new RouteNotFoundException("No existe ruta para este Pad");
        }

        list($controller,$method) = explode('@', $this->routes[$path]);
            $controller_name = "Paw\\App\\Controllers\\{$controller}";
            $objController = new $controller_name;
            $objController->$method($path);

    }
}