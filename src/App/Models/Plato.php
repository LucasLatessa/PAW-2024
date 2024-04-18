<?php

namespace Paw\App\Models;

class Plato{

    private string $nombre;
    private string $descripcion;
    private int $precio;

    public function __construct($nombre,$descripcion,$precio){
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getPrecio(){
        return $this->precio;
    }
}