<?php

#Separacion de responsabilidad del index.php

require __DIR__ . '/../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Dotenv\Dotenv;

use Paw\Core\Request;
use Paw\Core\Router; 
use Paw\Core\Config;


$dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/../');
$dotenv->load();

$config = new Config;


$log = new Logger('mvc-app-paw-power'); #Instancio logger y le pongo un nombre
$handler = new StreamHandler($config->get("LOG_PATH"));
$handler->setLevel($config->get("LOG_LEVEL"));
$log -> pushHandler($handler); #Nivel Debug en este caso, mas bajo

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler); #Manejador de errores
$whoops->register(); #Ahora el maneja los errores de PHP

$request = new Request;

$router = new Router;
$router->setLoggeable($log); #Agrego el log
$router->loadRoutes('/','PageController@index'); #Clase y metodo que procesa la peticion

#Compra
$router->loadRoutes('/compra/menu','PageController@menu'); 
$router->loadRoutes('/compra/carrito','PageController@carrito');
$router->loadRoutes('/compra/confirmarCompra','PageController@confirmarCompra');
$router->loadRoutes('/compra/pedirComida','PageController@pedirComida');
$router->loadRoutes('/compra/reserva','PageController@reserva');
$router->loadRoutes('/compra/selecDirec','PageController@selecDirec');
$router->loadRoutes('/compra/selecLoc','PageController@selecLoc');

#Creacion de plato
$router->loadRoutes('/compra/crearPlato','PageController@crearPlato');
$router->loadRoutes('/compra/prueba','PageController@prueba');

#Cuenta
$router->loadRoutes('/cuenta/agregarDireccion','PageController@agregarDireccion'); 
$router->loadRoutes('/cuenta/consumos','PageController@consumos');
$router->loadRoutes('/cuenta/login','PageController@login');
$router->loadRoutes('/cuenta/perfil','PageController@perfil');
$router->loadRoutes('/cuenta/registrarse','PageController@registrarse');

#Institucional
$router->loadRoutes('/institucional/locales','PageController@locales');
$router->loadRoutes('/institucional/nosotros','PageController@nosotros');
$router->loadRoutes('/institucional/servCliente','PageController@servCliente');