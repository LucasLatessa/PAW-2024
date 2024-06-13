<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Paw\App\Models\Reserva;

class ReservasCollections extends Model{
    public $table = 'reserva';

    public function getAll(){
        #Obtengo todas las reservas
        $reservas = $this->queryBuilder->selectViejo($this->table);
        #var_dump($reservas);
        $reservasCollection = [];
        foreach($reservas as $reserva){
            $nuevaReserva = new Reserva();
            $nuevaReserva->set($reserva);
            $reservasCollection[] = $nuevaReserva;
        }
        return $reservasCollection;
    }

    public function create($local,$cantidadPersonas,$dia,$hora,$mesa,$aclaraciones){
        $newReserva = new Reserva;

        $data = [
            'local' => $local,
            'cantidadPersonas' => $cantidadPersonas,
            'dia' => $dia,
            'hora' => $hora,
            'mesa' => $mesa,
            'aclaracion' => $aclaraciones
        ];

        $newReserva->setQueryBuilder($this->queryBuilder);
        $newReserva->set($data);

        $this->queryBuilder->insert($this->table,$data);
        return $newReserva;
    }
}