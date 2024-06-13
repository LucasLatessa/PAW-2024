<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Paw\App\Models\Carrito;

class CarritoCollections extends Model{

    public $table = 'carrito';

    public function getAll($idSesion){
        $carritos = $this->queryBuilder->selectViejo($this->table, ['idSesion' => $idSesion]);
        $carritoCollection = [];

        $platosCollection = new PlatosCollections();
        $platosCollection->setQueryBuilder($this->queryBuilder); // Pasar el QueryBuilder a PlatosCollections

        foreach($carritos as $carrito){
            $nuevoCarrito = new Carrito;
            $nuevoCarrito->set($carrito);

            // Obtén los detalles del plato asociado al carrito
            $plato = $platosCollection->get($nuevoCarrito->getIdPlato());
            $nuevoCarrito->plato = $plato; // Asigna los detalles del plato al carrito
            $carritoCollection[] = $nuevoCarrito;
        }
        return $carritoCollection;
    }

    public function get($idSesion){
        $carrito = new Carrito;
    }

    public function getPlato($id_producto){
        $platosCollection = new PlatosCollections;
        $plato = $platosCollection->get($id_producto);
        #return $plato;
    }

    public function create($idPlato, $aclaraciones,$cantidad, $idSesion){
        $newCarrito = new Carrito;

        $data = [
            'idPlato' => $idPlato,
            'aclaraciones' => $aclaraciones,
            'cantidad' => $cantidad,
            'idSesion' => $idSesion,
        ];

        $newCarrito->setQueryBuilder($this->queryBuilder);
        $newCarrito->set($data);

        $this->queryBuilder->insert($this->table, $data);
        return $newCarrito;
    }

    public function borrar($idPedido)
    {
        $this->queryBuilder->delete($this->table, ['id' => $idPedido]);
    }
}