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
}