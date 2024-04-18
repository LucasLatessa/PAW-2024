<?php

namespace Paw\App\Controllers;
use Paw\App\Models\Plato;

class MenuController
{
    public function crearPlato($nombre, $descripcion, $precio){
        $nuevoPlato = new Plato($nombre, $descripcion, $precio);
        return $nuevoPlato;
    }

}