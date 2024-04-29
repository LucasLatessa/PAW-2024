<?php

namespace Paw\App\Controllers;
use Paw\App\Models\Reserva;

class ReservaController
{
    public string $viewsDir; #Direccion a la vista indicada
    public function __construct(){

        
        $this->viewsDir = __DIR__ . "/../views/";

        $this->rutasMenuBurger = [
            /* Menu hamburguesa 0-2*/ 
            [
                "href" => '../compra/menu',
                "name" => "Menu",
            ],
            [
                "href" => '../compra/reserva',
                "name" => "Reserva mesa",
            ],
            [
                "href" => '../cuenta/perfil',
                "name" => "Perfil"
            ]
            ];
        $this->rutasLogoHeader =
            /*Logo header 3*/
            [
                "href" => '../',
                "name" => "Home",
            ];
        $this->rutasHeaderDer = [
            /*Header parte derecha 4-5*/
            [
                "href" => '../compra/carrito',
                "name" => "carrito",
            ],
            [
                "href" => '../cuenta/login',
                "name" => "usuario"
            ],
        ];
        $this->rutasFooter = [
            /*Footer 6-9*/
            [
                "href" => '../institucional/locales',
                "name" => "Locales"
            ],
            [
                "href" => '../institucional/servCliente',
                "name" => "Servicio al Cliente"
            ],
            [
                "href" => '../institucional/nosotros',
                "name" => "Sobre nosotros"
            ],
            [
                "href" => '../cuenta/consumos',
                "name" => "Consumos"
            ]
            ];
    }
    private function validarFecha($fecha){
        // Verificar si la fecha tiene un formato válido
        $fechaDateTime = \DateTime::createFromFormat('Y-m-d', $fecha);
        if (!$fechaDateTime || $fechaDateTime->format('Y-m-d') !== $fecha) {
            throw new \InvalidArgumentException("La fecha no tiene un formato válido. Se esperaba el formato: YYYY-MM-DD");
        }
    
        // Verificar si la fecha está en el futuro
        $fechaActual = new \DateTime();
        if ($fechaDateTime < $fechaActual) {
            throw new \InvalidArgumentException("La fecha debe ser en el futuro.");
        }
        return true;
    }

    public function crearReserva(){
        global $request;
        if ($this->validarFecha($request->getRequest('dia'))){
            $local = $request->getRequest('local');
            $cantidadPersonas = $request->getRequest('cantidadPersonas');
            $dia = $request->getRequest('dia');
            $horario = $request->getRequest('horario');
            $aclaraciones = $request->getRequest('aclaraciones');
            $reserva = new reserva($local,$cantidadPersonas,$dia,$horario,$aclaraciones);
            $title = "Reserva agregada - PAW Power";
            require $this->viewsDir . 'cuenta/perfil.view.php';
        }else{
            $errorMessage = "El archivo es muy pesado.";
    
            $title = "Agregar Reserva - PAW Power";
            require $this->viewsDir . 'compra/reserva.view.php';
        }
    }

}