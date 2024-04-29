<?php

namespace Paw\App\Models;

Class Carrito{
    private $nombre;
    private $descripcion;
    private $precio;
    private $notas;
    private $cantidad;
    private $borrar;
    private $pago;
    private $envio;

    public function __construct($nombre,$descripcion,$precio, $notas, $cantidad, $borrar, $pago, $envio){
        if (empty($nombre) || empty($Descripcion) || empty($Precio) || empty($Notas) || empty($Cantidad) || empty($Borrar) || empty($pago) || empty($envio)){            
            throw new \InvalidArgumentException("Nombre, imagen, descripción y precio son campos requeridos.");
        }

        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->notas = $notas;
        $this->cantidad= $cantidad;
        $this->borrar = $borrar;
        $this->pago = $pago;
        $this->envio = $envio;
    } 
    
    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getNotas() {
        return $this->notas;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getBorrar() {
        return $this->borrar;
    }
    
    public function getPago() {
        return $this->pago;
    }

    public function getEnvio() {
        return $this->envio;
    }



}