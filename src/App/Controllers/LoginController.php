<?php

namespace Paw\App\Controllers;
use Paw\App\Models\Usuario;

class LoginController{

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

    public function registrarse(){

        global $request;

        #Obtengo los datos de la peticion
        $nombre = $request->getRequest("nombre");
        $apellido = $request->getRequest("apellido");
        $email = $request->getRequest("email");
        $contraseña = $request->getRequest("contraseña");
        $validarcontraseña = $request->getRequest("validarContraseña");

    if($contraseña == $validarcontraseña){
        $usuario = new Usuario($nombre,$apellido,$email,$contraseña);
        $result = "¡Cuenta creada!";
    }else{
        $errorMessage = "Las contranseñas no coinciden";  
    }
    $title = "Registrarse" . ' - PAW Power';
    require $this->viewsDir . 'cuenta/registrarse.view.php';
    }


}