<?php

#Separacion de responsabilidad del index.php

require __DIR__ . '/../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('mvc-app-paw-power'); #Instancio logger y le pongo un nombre
$log -> pushHandler(new StreamHandler(__DIR__ . '/../logs/app.log', Logger::DEBUG)); #Nivel Debud en este caso, mas bajo

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler); #Manejador de errores
$whoops->register(); #Ahora el maneja los errores de PHP