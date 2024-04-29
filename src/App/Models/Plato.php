<?php

namespace Paw\App\Models;

class Plato{

    public $campos = [
        'nombre',
        'descripcion',
        'precio',
        'imagen'
    ];

    public function __construct($nombre, $descripcion, $precio, $imagen){
        if (empty($nombre) || empty($descripcion) || empty($precio) || empty($imagen)) {
            throw new \InvalidArgumentException("Nombre, imagen, descripción y precio son campos requeridos.");
        }

        $this->campos['nombre'] = $nombre;
        $this->campos['descripcion'] = $descripcion;
        $this->campos['precio'] = $precio;
        $this->campos['imagen'] = $imagen;
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