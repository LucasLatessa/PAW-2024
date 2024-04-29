<?php

namespace Paw\App\Models;

class Usuario{

    private $nombre;

    private $apellido;

    private $correo;

    private $contraseña;

    public function __construct($nombre,$apellido, $correo, $contraseña){
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

    public function setApellido(){
        $this->nombre = $nombre;
    }

    public function setCorreo(){
        $this->nombre = $nombre;
    }

    public function setContraseña(){
        $this->nombre = $nombre;
    }

}