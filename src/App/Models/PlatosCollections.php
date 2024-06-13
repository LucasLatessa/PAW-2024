<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Paw\App\Models\Plato;

class PlatosCollections extends Model{
    public $table = 'plato';

    public function getAll(){
        #Obtengo todos los platos
        $platos = $this->queryBuilder->selectViejo($this->table);
        #var_dump($reservas);
        $platosCollection = [];
        foreach($platos as $plato){
            $nuevoPlato = new Plato;
            $nuevoPlato->set($plato);
            $platosCollection[] = $nuevoPlato;
        }
        return $platosCollection;
    }

    public function get($id){
        // $plato = new Plato;
        // $plato->setQueryBuilder($this->queryBuilder);
        // $plato->load($id);
        // return $plato;
        // Obtener el plato por ID
        $plato = $this->queryBuilder->selectViejo($this->table, ['id' => $id]);
        return $plato ? $plato[0] : null; // Retorna el primer resultado, o null si no hay resultados
    }

    // public function getPlato($id){

    //     $platoData = $this->queryBuilder->selectViejo($this->table, ['id' => $id]);

    //     if ($platoData) {
    //         $plato = new Plato;
    //         $plato->set($platoData);
    //         return $plato;
    //     } else {
    //         return null; // O maneja el caso cuando no se encuentra el plato
    //     }
    // }

    /* usada antes para mostrar todo sin filtro, consulta general. Anda
    public function getItems($params = [])
    {
        return $this->queryBuilder->select('plato', $params);
    }*/

    /* ANDA y trae todo ordenado segun la dirección 
    public function getItems($sort,$direction){
        return $this->queryBuilder->selectOrder('plato',$sort,$direction);
    }*/

    public function getItems($sort,$direction,$minPrecio,$maxPrecio){
        return $this->queryBuilder->selectOrder2('plato',$sort,$direction,$minPrecio,$maxPrecio);
    }

    public function getTotalItems($params = [])
    {
        return $this->queryBuilder->count('plato', $params);
    }

    public function create($nombre, $descripcion, $precio, $imagen)
    {
        $newPlato = new Plato;
        $data = [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'imagen' => $imagen
        ];

        $newPlato->setQueryBuilder($this->queryBuilder);
        $newPlato->set($data);

        $this->queryBuilder->insert($this->table,$data);
        return $newPlato;
    }
}