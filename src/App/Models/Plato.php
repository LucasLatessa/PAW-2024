<?php

namespace Paw\App\Models;
use Paw\Core\Model;

class Plato extends Model{

    #Asocio el model con la tabla
    private $table = 'plato';

    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $imagen;

    // public function __construct($nombre, $descripcion, $precio, $imagen){
    //     if (empty($nombre) || empty($descripcion) || empty($precio) || empty($imagen)) {
    //         throw new \InvalidArgumentException("Nombre, imagen, descripción y precio son campos requeridos.");
    //     }

    //     $this->nombre = $nombre;
    //     $this->descripcion = $descripcion;
    //     $this->precio = $precio;
    //     $this->imagen = $imagen;
    // }

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

    public function getId(){
        return $this->id;
    }

    public function setNombre(string $nombre){
        $this->nombre = $nombre;
    }

    public function setDescripcion(string $descripcion){
        $this->descripcion = $descripcion;
    }

    public function setPrecio(string $precio){
        $this->precio = $precio;
    }

    public function setImagen(string $imagen){
        $this->imagen = $imagen;
    }

    public function setId(string $id){
        $this->id = $id;
    }

    #Para aplicar todos los seters junto con sus validaciones
    public function set(array $values)
    {
        foreach ($values as $field => $value) {
            #Creo el methodo y si existe lo ejecuto
            $method = "set" . ucfirst($field);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function load($id){
        $params = [ "id" => $id];
        #Me devuelve el elemento solo
        $record = current($this->queryBuilder->selectViejo($this->table,$params));
        $this->set($record);
    }
}