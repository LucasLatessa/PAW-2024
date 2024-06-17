<?php

namespace Paw\App\Models;

use Paw\App\Models\ElementosPedido;
use Paw\Core\Model;

class Pedido extends Model
{
    private $table = 'pedidos';
    private $id;
    private $idUsuario;
    private $fecha_pedido;
    private $elementos = [];
    private $estado = 'En preparacion';

    public function getId()
    {
        return $this->id;
    }
    public function getEstado()
    {
        return $this->estado;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getFecha_pedido()
    {
        return $this->fecha_pedido;
    }

    public function getElementos()
    {
        return $this->elementos;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }


    public function setFecha_pedido($fecha_pedido)
    {
        $this->fecha_pedido = $fecha_pedido;
    }

    public function agregarElemento($idPlato, $cantidad, $aclaraciones,$nombre,$descripcion)
    {
        $elemento = new ElementosPedido($idPlato,$cantidad,$aclaraciones,$nombre,$descripcion);
        $this->elementos[] = $elemento;
    }

    public function agregarElementoArray($elemento)
    {
        $nuevoElemento = new ElementosPedido();
        $nuevoElemento->set($elemento);
        $this->elementos[] = $nuevoElemento;
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
