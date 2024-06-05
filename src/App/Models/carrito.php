<?php

namespace Paw\App\Models;

use Paw\Core\Model;

class Carrito extends Model
{

    #Asocio el model con la tabla
    private $table = 'carrito';

    private string $id;

    private int $idPlato;

    private string $idSession;

    private string $aclaraciones;
    private int $cantidad;

    // public function __construct($nombre,$descripcion,$precio, $notas, $cantidad){
    //     if (empty($nombre) || empty($Descripcion) || empty($Precio) || empty($Notas) || empty($Cantidad)){            
    //         throw new \InvalidArgumentException("Nombre, imagen, descripción y precio son campos requeridos.");
    //     }

    //     $this->nombre = $nombre;
    //     $this->descripcion = $descripcion;
    //     $this->precio = $precio;
    //     $this->notas = $notas;
    //     $this->cantidad= $cantidad;

    // } 

    public function getAclaraciones(): string
    {
        return $this->aclaraciones;
    }

    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    public function getIdSession(): string
    {
        return $this->idSession;
    }

    public function getIdPlato(): int
    {
        return $this->idPlato;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setAclaraciones($aclaraciones)
    {
        $this->aclaraciones = $aclaraciones;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function setIdPlato($idPlato)
    {
        $this->idPlato = $idPlato;
    }

    public function setIdSession($idSession)
    {
        $this->idSession = $idSession;
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