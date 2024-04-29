<?php

namespace Paw\App\Controllers;
use Paw\App\Models\Reserva;
use Paw\Core\Controlador;

class ReservaController extends Controlador
{
    public string $viewsDir; #Direccion a la vista indicada
    public function __construct(){
        parent::__construct();
    }
    private function validarReserva( $cantidadPersonas, $dia, $horario){
        // Verificar formato fecha
        $fechaDateTime = \DateTime::createFromFormat('Y-m-d', $dia);
        if (!$fechaDateTime || $fechaDateTime->format('Y-m-d') !== $dia) {
            throw new \InvalidArgumentException("La fecha no tiene un formato válido. Se esperaba el formato: YYYY-MM-DD");
        }
    
        // Verificar fecha en el futuro
        $fechaActual = new \DateTime();
        if ($fechaDateTime < $fechaActual) {
            throw new \InvalidArgumentException("La fecha debe ser en el futuro.");
        }
    
        // validar formato de horario
        $formatoHorario = "/^\d{1,2}:\d{2} [AP]M - \d{1,2}:\d{2} [AP]M$/";
        if (!preg_match($formatoHorario, $horario)) {
            throw new \InvalidArgumentException("El formato del horario no es válido. Se esperaba HH:MM AM/PM - HH:MM AM/PM");
        }
    
        // verificar personas > 1
        if ($cantidadPersonas < 1) {
            throw new \InvalidArgumentException("La cantidad de personas debe ser mayor a 1.");
        }
    
        return true;
    }

    public function crearReserva(){
        global $request;
        $local = $request->getRequest('local');
        $cantidadPersonas = $request->getRequest('cantidadPersonas');
        $dia = $request->getRequest('dia');
        $horario = $request->getRequest('horario');
        if ($this->validarReserva($cantidadPersonas,$dia,$horario)){
            $aclaraciones = $request->getRequest('aclaraciones');
            $reserva = new Reserva($local,$cantidadPersonas,$dia,$horario,$aclaraciones);
            $title = "Reserva agregada - PAW Power";
            require $this->viewsDir . 'cuenta/perfil.view.php';
        }else{
            $errorMessage = "El archivo es muy pesado.";
    
            $title = "Agregar Reserva - PAW Power";
            require $this->viewsDir . 'compra/reserva.view.php';
        }
    }
}