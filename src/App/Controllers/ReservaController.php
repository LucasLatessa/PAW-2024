<?php

namespace Paw\App\Controllers;

use Paw\App\Models\Reserva;
use Paw\App\Models\ReservasCollections;
use Paw\Core\Controlador;

class ReservaController extends Controlador
{

    public ?string $modelName = ReservasCollections::class;
    public string $viewsDir; #Direccion a la vista indicada

    public function crearReserva()
    {
        global $request;
        $local = $request->getRequest('listaLocales');
        $cantidadPersonas = $request->getRequest('cantidadPersonas');
        $dia = $request->getRequest('dia');
        $hora = $request->getRequest('listaHorarios');
        $mesa = $request->getRequest('mesa');
        $aclaraciones = $request->getRequest('aclaraciones');

        $aclaraciones = $request->getRequest('aclaraciones');
        $reserva = $this->model->create($local, $cantidadPersonas, $dia, $hora, $mesa, $aclaraciones);
        $title = "Reserva agregada - PAW Power";

        echo $this->twig->render('cuenta/perfil.view.twig', ['title' => $title]);
    }

    public function reservasAll()
    {
        header('Content-Type: application/json');

        try {
            $reserva = $this->model->getAll();
            echo json_encode($reserva);
        } catch (\Exception $e){
            http_response_code(500);
            echo json_encode(['error' => 'Error al obtener las reservas']);
        }
    }
}