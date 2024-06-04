<?php

namespace Paw\App\Models;

use DateTime;
use Paw\Core\Exceptions\InvalidValueFormatoException;
use Paw\Core\Model;

class Reserva extends Model
{
    #Asocio el model con la tabla
    private $table = 'reserva';

    #Local-CantPersonas-Dia-Horario-Mesa-Aclaraciones
    private $id;
    private $local;
    private $cantidadPersonas;
    private $dia;
    private $hora;
    private $mesa;
    private $aclaraciones;

    #public function __construct($local, $cantidadPersonas, $dia, $horario, $aclaraciones)
    #{
        // if (empty($local) || empty($cantidadPersonas) || empty($dia) || empty($horario)) {
        //     throw new \InvalidArgumentException("local, cantidad de personas, dia y horario son campos requeridos.");
        // }
        // $this->local = $local;
        // $this->getCantidadPersonas = $cantidadPersonas;
        // $this->dia = $dia;
        // $this->horario = $horario;
        // $this->aclaraciones = $aclaraciones;
    #}

    public function getLocal()
    {
        return $this->local;
    }

    public function getCantidadPersonas()
    {
        return $this->cantidadPersonas;
    }

    public function getDia()
    {
        return $this->dia;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function getAclaraciones()
    {
        return $this->aclaraciones;
    }

    public function setLocal(string $local)
    {
        if ($local != "Local 1" and $local != "Local 2") {
            throw new InvalidValueFormatoException("Solo existen dos locales: Local 1 o Local 2");
        }

        $this->local = $local;
    }

    public function setCantidadPersona(string $cantidadPersonas)
    {
        if ($cantidadPersonas < 0 or $cantidadPersonas > 7) {
            throw new InvalidValueFormatoException("No se puede reservar una mesa con esa cantidad de personas (Maximo 6)");
        }

        $this->cantidadPersonas = $cantidadPersonas;
    }

    public function setDia(string $dia)
    {
        #Convierto el parámetro $dia a un objeto DateTime
        $diaDate = new DateTime($dia);

        #Fecha actual
        $hoy = new DateTime();
        $hoy->setTime(0, 0, 0);

        if ($diaDate < $hoy) {
            throw new InvalidValueFormatoException("No se puede reservar una mesa para una fecha anterior a la actual.");
        }

        $this->dia = $dia;
    }

    public function setHora($hora)
    {
        // Expresión regular para validar el formato HH:MM
        $pattern = '/^(?:[01]\d|2[0-3]):[0-5]\d$/';

        #if (!preg_match($pattern, $hora)) {
        #   throw new InvalidValueFormatoException("La hora proporcionada no es #válida. Debe estar en formato HH:MM.");
        #}

        $this->hora = $hora;
    }

    public function setMesa(string $mesa)
    {
        $this->mesa = $mesa;
    }


    public function setAclaraciones(string $aclaraciones)
    {
        if (strlen($aclaraciones) > 100) {
            throw new InvalidValueFormatoException("La aclaracion no debe ser mayor a 60 caracteres");
        }

        $this->aclaraciones = $aclaraciones;
    }

    public function setId(string $id)
    {
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

}