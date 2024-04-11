<?php

require __DIR__ . '/../src/bootstrap.php';

#use Paw\Core\Router; 
use Paw\App\Controllers\PageController;


$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$log->info("Peticion a: {$path}");

#$router = new Router;
#$router->loadRoutes();
#$router->direct($path);

$controller = new PageController;

if ($path == '/'){
    $controller->index();
    $log->info("Respuesta exitosa: 200");
} else {
    $controller->rutas($path);
    $log->info("Respuesta exitosa: 200");
}

