<?php

namespace Paw\App\Controllers;
use Paw\App\Models\Reserva;
use Paw\App\Models\Carrito;

class CompraController
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
    public function selecLoc(){
        global $request;

        // Verificar si se ha enviado el campo del local en el formulario
        if (empty($request->getRequest('local'))) {
            // Si el campo del local está vacío, redirigir de vuelta al formulario con un mensaje de error
            $title = "Agregar Reserva - PAW Power";
            require $this->viewsDir . 'compra/selecLoc.view.php';
        } else{
            $local=$request->getRequest('local');
            $title = "Carrito - PAW Power";
            require $this->viewsDir . 'compra/carrito.view.php';
        }
}
    public function selecDirec(){
        global $request;

        // Verificar si se ha enviado el campo del local en el formulario
        if (empty($request->getRequest('direccion'))) {
            // Si el campo del local está vacío, redirigir de vuelta al formulario con un mensaje de error
            $title = "Seleccionar Direccion - PAW Power";
            require $this->viewsDir . 'compra/selecDirec.view.php';
        } else{
            $direc=$request->getRequest('direccion');
            $title = "Carrito - PAW Power";
            require $this->viewsDir . 'compra/carrito.view.php';
        }
}

    public function crearFilaCarrito(){
        global $request;

        $nombre = $request->getRequest('nombre');
        $descripcion = $request->getRequest('descripcion');
        $precio = $request->getRequest('precio');
        $notas = $request->getRequest('notas');
        $cantidad = $request->getRequest('cantidad');
        $pago = $request->getRequest('pago');
        $envio = $request->getRequest('envio');

        $filaCarrito = new Carrito($nombre,$descripcion,$precio, $notas, $cantidad, $pago, $envio);
    }

}