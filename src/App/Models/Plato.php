<?php

namespace Paw\App\Models;

class Plato{

    public $campos = [
        'nombre',
        'descripcion',
        'precio',
        'imagen'
    ];

    /*public function __construct($nombre,$descripcion,$precio,$foto){
        $this->campos['nombre'] = $nombre;
        $this->campos['descripcion'] = $descripcion;
        $this->campos['precio'] = $precio;
        $this->campos['foto'] = $foto;
    }*/

    
    public function __construct($camposPOST){
        $this->campos['nombre'] = $camposPOST['nombre'];
        $this->campos['descripcion'] = $camposPOST['descripcion'];
        $this->campos['precio'] = $camposPOST['precio'];
        $this->campos['imagen'] = $camposPOST['imagen'];
    }

    public function getPlato(){
        return $this->campos;
    }

    public function getNombre(){
        return $this->campos['nombre'];
    }

    public function getDescripcion(){
        return $this->campos['descripcion'];
    }

    public function getPrecio(){
        return $this->campos['precio'];
    }
    public function getImagen(){
        return $this->campos['imagen'];
    }
}