<?php

namespace Paw\App\Models;

class Plato{

    private $nombre;
    private $descripcion;
    private $precio;
    private $imagen;

    public function __construct($nombre, $descripcion, $precio, $imagen){
        if (empty($nombre) || empty($descripcion) || empty($precio) || empty($imagen)) {
            throw new \InvalidArgumentException("Nombre, imagen, descripción y precio son campos requeridos.");
        }

        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->imagen = $imagen;
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
    public function getImagen(){
        return $this->imagen;
    }
}