<?php

namespace Paw\App\Models;
use Paw\Core\Exceptions\EmailException;

class Usuario{

    private $nombre;

    private $apellido;

    private $correo;

    private $contraseña;

    public function __construct($nombre,$apellido, $correo, $contraseña){

        //Valido que esten todos los campos requeridos
        if (empty($nombre) || empty($apellido) || empty($correo) || empty($contraseña)) {
            throw new \InvalidArgumentException("Nombre, apellido, correo y contraseña son campos requeridos.");
        }

        #Validacion de correo "Solo formato a@a.com"
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            throw new EmailException("Esta dirección de correo ($correo) no es válida");
        }

        #Creacion de la instancia
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setCorreo($correo);
        $this->setContraseña($contraseña);
    }

    #Getters
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

    #Setters
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