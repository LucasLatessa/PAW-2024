<?php

namespace Paw\App\Controllers;
use Paw\App\Models\Direccion;

class CuentaController{

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
    public function validarDireccion($request) {
        $errores = [];

        // Validar el código postal
        $codigoPostal = $request->getRequest('ccpp');
        if (!preg_match('/^\d{4}$/', $codigoPostal)) {
            $errores['ccpp'] = "El código postal debe tener 4 dígitos numéricos.";
        }

        return $errores;
    }
    public function crearDireccion() {
        global $request;

        $errores = $this->validarDireccion($request);

        if (empty($errores)) {
            $pais= $request->getRequest('pais');
            $provincia= $request->getRequest('provincia');
            $ciudad= $request->getRequest('ciudad');
            $ccpp= $request->getRequest('ccpp');
            $direc= $request->getRequest('direccion');
            $aclaraciones= $request->getRequest('aclaraciones');
            $direccion=new Direccion($pais,$provincia,$ciudad,$ccpp,$direc,$aclaraciones);
            $title = "Direccion agregada - PAW Power";
            $creada = "Direccion creada!";
            require __DIR__ . '/../views/cuenta/perfil.view.php';
        } else {
            $title = "Agregar Dirección - PAW Power";
            require __DIR__ . '/../views/cuenta/agregarDireccion.view.php';
        }
    }
}
