<?php

namespace Paw\App\Models;

class Usuario{

    private $nombre;

    private $apellido;

    private $correo;

    private $contraseña;

    public function __construct($nombre,$apellido, $correo, $contraseña){

        if (empty($nombre) || empty($apellido) || empty($correo) || empty($contraseña)) {
            throw new \InvalidArgumentException("Nombre, apellido, correo y contraseña son campos requeridos.");
        }

        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->contraseña = $contraseña;

    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getContraseña(){
        return $this->contraseña;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }

    public function setContraseña($contraseña){
        $this->contraseña = $contraseña;
    }

}