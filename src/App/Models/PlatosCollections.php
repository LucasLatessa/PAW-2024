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
        $plato = new Plato;
        $plato->setQueryBuilder($this->queryBuilder);
        $plato->load($id);
        return $plato;
    }

    public function getPlato($id){

        $platoData = $this->queryBuilder->selectViejo($this->table, ['id' => $id]);

        if ($platoData) {
            $plato = new Plato;
            $plato->set($platoData);
            return $plato;
        } else {
            return null; // O maneja el caso cuando no se encuentra el plato
        }
    }
}