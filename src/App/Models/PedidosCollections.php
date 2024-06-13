<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Paw\App\Models\Pedido;

class PedidosCollections extends Model{
    public $table = 'pedidos';
    public $tableElementos_pedido = "elementos_pedido";

    public function create($idSesion,$idUsuario)
    {
        $carrito = new CarritoCollections();
        $carrito->setQueryBuilder($this->queryBuilder);
        $elementosCarrito = $carrito->getAll($idSesion,$idUsuario);

        $pedido = new Pedido();
        $pedido->setIdUsuario($idUsuario);
        $pedido->setFecha_pedido(date('Y-m-d H:i:s'));

        $data = [
            'idUsuario' => $pedido->getIdUsuario(),
            'fecha_pedido' => $pedido->getFecha_pedido(),
        ];
        
        $idPedido = $this->queryBuilder->insert($this->table, $data);

        foreach ($elementosCarrito as $elemento)
        {
            $dataElementos = [
                "id_pedido" => $idPedido,
                "id_plato" => $elemento->getIdPlato(),
                "aclaraciones" => $elemento->getAclaraciones(),
                "cantidad" => $elemento->getCantidad(),
            ];

            $this->queryBuilder->insert($this->tableElementos_pedido, $dataElementos);
        }

        return $pedido;
    }

    public function getAll()
    {
        $pedidos = $this->queryBuilder->selectViejo($this->table);
        $pedidoCollections = [];

        foreach($pedidos as $pedido)
        {
            $nuevoPedido = new Pedido();
            $nuevoPedido->set($pedido);

            $elementos = $this->queryBuilder->selectViejo($this->tableElementos_pedido,['id_pedido' => $nuevoPedido->getId()]);

            foreach($elementos as $elemento)
            {
                $nuevoPedido->agregarElementoArray($elemento);
            }
            $pedidoCollections[] = $nuevoPedido;
        }

        return $pedidoCollections;
    }
}