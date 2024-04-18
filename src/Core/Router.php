<?php

namespace Paw\Core;
use Paw\Core\Request;
use Paw\Core\Exceptions\RouteNotFoundException;

class Router
{
    public array $routes;

    public function loadRoutes($path,$action)
    {
        $this->routes[$path] = $action;
    }

    public function direct(Request $request)
    {
        #var_dump($path);
        #var_dump($this->routes);
        #var_dump(array_key_exists($path,$this->routes));
        list($path, $http_method) = $request->route();
        if (!array_key_exists($path,$this->routes)){
            throw new RouteNotFoundException("La ruta especificada no existe: $path");
        }
        
        list($controller,$method) = explode('@', $this->routes[$path]);
        $controller_name = "Paw\\App\\Controllers\\{$controller}";
        
        $objController = new $controller_name;
        $objController->$method($path);
    }
}