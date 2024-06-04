<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Paw\App\Models\Carrito; 

class CarritoCollections extends Model{

    public $table = 'carrito';

    public function getAll(){

    }

    public function get(){
        
    }

    public function create($id_producto, $aclaraciones,$cantidad, $idSesion){
        $newCarrito = new Carrito;

        $data = [
            'id_producto' => $id_producto,
            'aclaraciones' => $aclaraciones,
            'cantidad' => $cantidad,
            'idSesion' => $idSesion,
        ];

        $newCarrito->setQueryBuilder($this->queryBuilder);
        $newCarrito->set($data);

        $this->queryBuilder->insert($this->table, $data);
        return $newCarrito;
    }
}