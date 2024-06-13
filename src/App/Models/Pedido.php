<?php

namespace Paw\App\Models;

use Paw\App\Models\ElementosPedido;
use Paw\Core\Model;

class Pedido extends Model
{
    private $table = 'pedido';
    private $id;
    private $idUsuario;
    private $fechaHora;
    private $elementos = [];

    public function getId()
    {
        return $this->id;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getFechaHora()
    {
        return $this->fechaHora;
    }

    public function getElementos()
    {
        return $this->elementos;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }


    public function setFechaHora($fechaHora)
    {
        $this->fechaHora = $fechaHora;
    }

    public function agregarElemento($idPlato, $cantidad, $aclaraciones)
    {
        $elemento = new ElementosPedido($idPlato,$cantidad,$aclaraciones);
        $this->elementos[] = $elemento;
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
