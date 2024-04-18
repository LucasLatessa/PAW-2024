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
    /*public function getPlato(){
        $retorno = [];
        
        $retorno[0] = $this->nombre;
        $retorno[1] = $this->descripcion;
        $retorno[2] = $this->precio;
        
        return $retorno;
    }*/

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