<?php

namespace Paw\App\Models;

use Paw\Core\Model;

class ElementosPedido extends Model
{
    private $idPlato;
    private $cantidad;
    private $aclaraciones;

    public function __construct($idPlato,$cantidad,$aclaraciones){
        $this->$idPlato = $idPlato;
        $this->$cantidad = $cantidad;
        $this->$aclaraciones = $aclaraciones;
    }

    public function getIdPlato()
    {
        return $this->idPlato;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function getAclaraciones()
    {
        return $this->aclaraciones;
    }


    public function setIdPlato($idPlato)
    {
        $this->idPlato = $idPlato;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
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