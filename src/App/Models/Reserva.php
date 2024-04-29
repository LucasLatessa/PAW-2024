<?php

namespace Paw\App\Models;

class Reserva{
    private $local;
    private $cantidadPersonas;
    private $dia;
    private $horario;
    private $aclaraciones;

    public function __construct($local, $cantidadPersonas, $dia, $horario,$aclaraciones){
        if (empty($local) || empty($cantidadPersonas) || empty($dia) || empty($horario)) {
            throw new \InvalidArgumentException("local, cantidad de personas, dia y horario son campos requeridos.");
        }
        $this->local = $local;
        $this->getCantidadPersonas = $cantidadPersonas;
        $this->dia = $dia;
        $this->horario = $horario;
        $this->aclaraciones = $aclaraciones;
    }

    public function getLocal(){
        return $this->nombre;
    }

    public function getCantidadPersonas(){
        return $this->descripcion;
    }

    public function getDia(){
        return $this->dia;
    }

    public function getHorario(){
        return $this->horario;
    }

    public function getAclaraciones(){
        return $this->aclaraciones;
    }
    
}