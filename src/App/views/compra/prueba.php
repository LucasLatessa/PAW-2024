<?php

use Paw\App\Controllers\MenuController;

$contr = new MenuController;
$nuevoPlato = $contr->crearPlato($_POST['nombre'],$_POST['descripcion'],$_POST['precio']);

var_dump($nuevoPlato->getNombre());
var_dump($nuevoPlato->getDescripcion());
var_dump($nuevoPlato->getPrecio());