<?php

require __DIR__ . '/../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Dotenv\Dotenv;

use Paw\Core\Database\ConnectionBuilder;
use Paw\Core\Request;
use Paw\Core\Router;
use Paw\Core\Config;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Configuro Twig
$loader = new FilesystemLoader(__DIR__ . '/App/views'); // Ruta a vistas Twig
$twig = new Environment($loader, [
    'cache' => __DIR__ . '/App/cache',
]);

$dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/../');
$dotenv->load();

$config = new Config;


$log = new Logger('mvc-app-paw-power'); #Instancio logger y le pongo un nombre
$handler = new StreamHandler($config->get("LOG_PATH"));
$handler->setLevel($config->get("LOG_LEVEL"));
$log->pushHandler($handler); #Nivel Debug en este caso, mas bajo

#Conexion con la base de datos
$connectionBuilder = new ConnectionBuilder;
$connectionBuilder->setLoggeable($log);
$connection = $connectionBuilder->make($config);

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler); #Manejador de errores
$whoops->register(); #Ahora el maneja los errores de PHP

$request = new Request;

$router = new Router;
$router->setLoggeable($log); #Agrego el log

#Index
$router->get('/', 'PageController@index'); #Clase y metodo que procesa la peticion

# ------------------------ TURNERA --------------------------------
$router->get('/turnera', 'PedidoController@turnosPantalla'); #Clase y metodo que procesa la peticion

#------------------------ DISPLAY ESTADOS COCINA--------------------------------
$router->get('/display-estados-cocina', 'PedidoController@displayEstadosCocina');
$router->get('/api/pedidos','PedidoController@getPedidos');
$router->get('/api/pedidosCocina','PedidoController@getPedidosCocina');
$router->put('/api/pedidosCocina','PedidoController@changePedido');

# ------------------------ COMPRA --------------------------------

$router->get('/compra/menu', 'MenuController@mostrarMenu');

#Pedir comida
$router->get('/compra/pedirComida', 'MenuController@pedirComida');
$router->post('/compra/pedirComida', 'CarritoController@crearPedido');

$router->get('/compra/carrito', 'CarritoController@carrito');
$router->post('/compra/carrito', 'PedidoController@crearPedido');

$router->get('/compra/borrarProducto', 'CarritoController@borrarProducto');

// $router->get('/compra/confirmarCompra', 'PageController@confirmarCompra');
// $router->post('/compra/confirmarCompra', 'PageController@confirmarCompra');

#Seleccionar direccion (en carrito)
$router->get('/compra/selecDirec', 'PageController@selecDirec');

#Seleccionar local
$router->get('/compra/selecLoc', 'PageController@selecLoc');
$router->post('/compra/selecLoc', 'CompraController@selecLoc');
#Seleccionar direccion
$router->get('/compra/selecDirec', 'PageController@selecDirec');
$router->post('/compra/selecDirec', 'CompraController@selecDirec');
#Reserva de mesa
$router->get('/compra/reserva', 'PageController@reserva');
$router->post('/compra/reserva', 'ReservaController@crearReserva');
$router->get('/compra/reservasAll', 'ReservaController@reservasAll');

#Creacion de plato
$router->get('/menu/crearPlato', 'PageController@crearPlato');
$router->post('/menu/crearPlato', 'MenuController@crearPlato');

# ------------------------ CUENTA --------------------------------

#Agregar direccion
$router->get('/cuenta/agregarDireccion', 'PageController@agregarDireccion');
$router->post('/cuenta/agregarDireccion', 'UsuarioController@crearDireccion');

#Consumos
$router->get('/cuenta/consumos', 'PedidoController@verConsumos');

#Perfil
$router->get('/cuenta/perfil', 'PageController@perfil');
$router->post('/cuenta/perfil', 'UsuarioController@actualizarPerfil');

#Login
$router->get('/cuenta/login', 'PageController@login');
$router->get('/cuenta/logout', 'UsuarioController@logout');
$router->post('/cuenta/login', 'UsuarioController@login');

#Registro
$router->get('/cuenta/registrarse', 'PageController@registrarse');
$router->post('/cuenta/registrarse', 'UsuarioController@registrarse');

# ------------------------ INSTITUCIONAL --------------------------------

$router->get('/institucional/locales', 'PageController@locales');
$router->get('/institucional/nosotros', 'PageController@nosotros');
$router->get('/institucional/servCliente', 'PageController@servCliente');
