<?php

namespace Paw\Core;
use Paw\Core\Exceptions\RouteNotFoundException;
use Exception;

class Router
{
    public array $routes;
    public function loadRoutes($path,$action)
    {
        $this->routes[$path] = $action;
    }

    public function direct($path)
    {
        #var_dump($path);
        #var_dump($this->routes);
        #var_dump(array_key_exists($path,$this->routes));
        if (!array_key_exists($path,$this->routes)){
            throw new Exception("La ruta especificada no existe: $path");
        }
        
        list($controller,$method) = explode('@', $this->routes[$path]);
        $controller_name = "Paw\\App\\Controllers\\{$controller}";
        
        $objController = new $controller_name;
        $objController->$method($path);
    }
}