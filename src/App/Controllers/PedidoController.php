<?php

namespace Paw\App\Controllers;

class PedidoController{
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

    public function seleccionarLocal(){
        
        global $request;
        
        
        #Obtengo los datos de la peticion
        $local = $request->getRequest("local");
        
        #Valido que sea un local valido
        if (!($local == "Local 1" or $local == "Local 2")){
            $errorMessage = "Local no valido";
            $title = "Seleccionar Local" . ' - PAW Power';
            require $this->viewsDir . 'compra/selecLoc.view.php';
        } else {
            $title = "Carrito" . ' - PAW Power';
            require $this->viewsDir . 'compra/carrito.view.php';
        }
    }

}