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

#Index
$router->get('/','PageController@index'); #Clase y metodo que procesa la peticion

# ------------------------ COMPRA --------------------------------

$router->get('/compra/menu','PageController@menu'); 
$router->get('/compra/carrito','PageController@carrito');
$router->get('/compra/confirmarCompra','PageController@confirmarCompra');
$router->get('/compra/pedirComida','PageController@pedirComida');

#Seleccionar direccion (en carrito)
$router->get('/compra/selecDirec','PageController@selecDirec');

#Seleccionar local
$router->get('/compra/selecLoc','PageController@selecLoc');
$router->post('/compra/selecLoc','CompraController@selecLoc');
#Seleccionar direccion
$router->get('/compra/selecDirec','PageController@selecDirec');
$router->post('/compra/selecDirec','CompraController@selecDirec');
#Reserva de mesa
$router->get('/compra/reserva','PageController@reserva');
$router->post('/compra/reserva','ReservaController@crearReserva');

#Creacion de plato
$router->get('/menu/crearPlato','PageController@crearPlato');
$router->post('/menu/crearPlato','MenuController@crearPlato');

# ------------------------ CUENTA --------------------------------

#Agregar direccion
$router->get('/cuenta/agregarDireccion','PageController@agregarDireccion');
$router->post('/cuenta/agregarDireccion','CuentaController@crearDireccion');

#Consumos
$router->get('/cuenta/consumos','PageController@consumos');

#Perfil
$router->get('/cuenta/perfil','PageController@perfil');
$router->post('/cuenta/perfil','LoginController@actualizarPerfil');

#Login
$router->get('/cuenta/login','PageController@login');
$router->post('/cuenta/login','LoginController@login');

#Registro
$router->get('/cuenta/registrarse','PageController@registrarse');
$router->post('/cuenta/registrarse','LoginController@registrarse');

# ------------------------ INSTITUCIONAL --------------------------------

$router->get('/institucional/locales','PageController@locales');
$router->get('/institucional/nosotros','PageController@nosotros');
$router->get('/institucional/servCliente','PageController@servCliente');