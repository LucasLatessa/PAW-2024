<?php

namespace Paw\App\Models;

class Local{

    private $nombre;
    private $direccion;

    public function __construct($nombre,$direccion) {
        if (empty($nombre) || empty($direccion)) {
            throw new \InvalidArgumentException("Los campos nombre y dirección son obligatorios.");
        }
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }


}