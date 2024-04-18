<?php

#Punto de entrada a mi aplicacion -> ubicado en controlador

require __DIR__ . '/../src/bootstrap.php';

use Paw\Core\Exceptions\RouteNotFoundException;

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$log->info("Peticion a: {$path}");

try{
    #var_dump($path);
    $router->direct($path);
    $log->info("Respuesta exitosa: 200 - {$path}");
} catch (RouteNotFoundException $e){
    $router->direct('not_found');
    $log->info("Path not found: 404 - Route not found", ["Path" => $path]);
} catch (Exception $e){
    $router->direct("internal_error");
    $log->error("Status code:500 - Internal server error", ["Error" => $e]);
}

/*$controller = new PageController;

if ($path == '/'){
    $controller->index();
    $log->info("Respuesta exitosa: 200");
} else {
    $controller->rutas($path);
    $log->info("Respuesta exitosa: 200");
}*/

