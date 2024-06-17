<?php

namespace Paw\App\Models;

use Paw\Core\Model;

class ElementosPedido extends Model
{
    private $id_plato;
    private $cantidad;
    private $aclaraciones;
    private $nombre;
    private $descripcion;

    public function __construct($idPlato = null,$cantidad = null,$aclaraciones = null, $nombre=null,$descripcion=null){
        $this->$idPlato = $idPlato;
        $this->$cantidad = $cantidad;
        $this->$aclaraciones = $aclaraciones;
        $this->$nombre = $nombre;
        $this->$descripcion = $descripcion;
    }

    public function getId_plato()
    {
        return $this->id_plato;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getAclaraciones()
    {
        return $this->aclaraciones;
    }


    public function setId_plato($id_plato)
    {
        $this->id_plato = $id_plato;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }


    public function setAclaraciones($aclaraciones)
    {
        $this->aclaraciones = $aclaraciones;
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
}