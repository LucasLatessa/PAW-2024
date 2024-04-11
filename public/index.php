<?php

require __DIR__ . '/../vendor/autoload.php';

use Paw\App\Controllers\PageController;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler); #Manejador de errores
$whoops->register(); #Ahora el maneja los errores de PHP

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$controller = new PageController;

if ($path == '/'){
    $controller->index();
} else {
    $controller->rutas($path);
}

/*
} else if ($path = "/menu"){
    $controller->menu();

} else if ($path = "/compra/carrito"){
    $titulo = htmlspecialchars($_GET['nombre'] ?? "PAW");

    require __DIR__ . '/../src/compra/carrito.view.php';

} else if ($path = "/cuenta/login"){
    $titulo = htmlspecialchars($_GET['nombre'] ?? "PAW");

    require __DIR__ . '/../src/cuenta/login.view.php';
} else {
    #echo "Page not found";
    http_response_code(404);
    require __DIR__ . '/../src/not-found.view.php';
}*/


