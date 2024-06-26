<?php

namespace Paw\App\Models;
use Paw\Core\Exceptions\EmailException;
use Paw\Core\Model;

class Usuario extends Model{
    public $table = 'usuario';
    private $id;
    private $nombre;

    private $apellido;

    private $correo;

    private $contraseña;

    /*public function __construct($nombre,$apellido, $correo, $contraseña){

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
    }*/

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

    public function getId(){
        return $this->id;
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

    public function setId($id){
        $this->id = $id;
    }

    public function set(array $values){
        foreach ($values as $field => $value) {
            $method = "set" . ucfirst($field);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function load($usuarioEmail,$usuarioContraseña){
        $params = ["correo" => $usuarioEmail, "contraseña" => $usuarioContraseña];

        $record = current($this ->queryBuilder->select($this->table, $params));       
        if(!empty($record)){
            $this ->set($record);
        }
    }
}