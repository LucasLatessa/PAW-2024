<?php

namespace Paw\App\Controllers;

class PageController
{
    public string $viewsDir; #Direccion a la vista indicada

    public function __construct()
    {
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

    public function index()
    {
        $title = $this->rutasLogoHeader; #Hardoceado
        $title = ucfirst($title['name']) . ' - PAW Power';
        require $this->viewsDir . 'index.view.php';
    }

    /*--------------COMPRA------------------*/

    public function menu()
    {
        $title = $this->rutasMenuBurger[0]; #Hardoceado
        $title = ucfirst($title['name']) . ' - PAW Power';
        require $this->viewsDir . 'compra/menu.view.php';
    }

    public function carrito()
    {
        $title = $this->rutasHeaderDer[0]; #Hardoceado
        $title = ucfirst($title['name']) . ' - PAW Power';
        require $this->viewsDir . 'compra/carrito.view.php';
    }

    public function confirmarCompra()
    {
        $title = "Confirmar compra" . ' - PAW Power';
        require $this->viewsDir . 'compra/confirmarCompra.view.php';
    }

    public function pedirComida()
    {
        $title = "Pedir comida" . ' - PAW Power';
        require $this->viewsDir . 'compra/pedirComida.view.php';
    }

    public function reserva()
    {
        $title = $this->rutasMenuBurger[1]; #Hardoceado
        $title = ucfirst($title['name']) . ' - PAW Power';
        require $this->viewsDir . 'compra/reserva.view.php';
    }

    public function selecDirec()
    {
        $title = "Seleccionar direccion" . ' - PAW Power';
        require $this->viewsDir . 'compra/selecDirec.view.php';
    }

    public function selecLoc()
    {
        $title = "Seleccionar local" . ' - PAW Power';
        require $this->viewsDir . 'compra/selecLoc.view.php';
    }

    public function crearPlato()
    {
        $title = "Crear plato" . ' - PAW Power';
        require $this->viewsDir . 'compra/crearPlato.view.php';
    }

    /*--------------CUENTA------------------*/

    public function agregarDireccion()
    {
        $title = "Agregar direccion" . ' - PAW Power';
        require $this->viewsDir . 'cuenta/agregarDireccion.view.php';
    }

    public function consumos()
    {
        $title = $this->rutasFooter[3]; #Hardoceado
        $title = ucfirst($title['name']) . ' - PAW Power';
        require $this->viewsDir . 'cuenta/consumos.view.php';
    }

    public function login()
    {
        $title = $this->rutasHeaderDer[1]; #Hardoceado
        $title = ucfirst($title['name']) . ' - PAW Power';
        require $this->viewsDir . 'cuenta/login.view.php';
    }

    public function perfil()
    {
        $title = $this->rutasMenuBurger[2]; #Hardoceado
        $title = ucfirst($title['name']) . ' - PAW Power';
        require $this->viewsDir . 'cuenta/perfil.view.php';
    }

    public function registrarse()
    {
        $title = "Registrarse" . ' - PAW Power';
        require $this->viewsDir . 'cuenta/registrarse.view.php';
    }

    /*--------------INSTITUCIONAL------------------*/

    public function locales()
    {
        $title = $this->rutasFooter[0]; #Hardoceado
        $title = ucfirst($title['name']) . ' - PAW Power';
        require $this->viewsDir . 'institucional/locales.view.php';
    }

    public function nosotros()
    {
        $title = $this->rutasFooter[2]; #Hardoceado
        $title = ucfirst($title['name']) . ' - PAW Power';
        require $this->viewsDir . 'institucional/nosotros.view.php';
    }

    public function servCliente()
    {
        $title = $this->rutasFooter[1]; #Hardoceado
        $title = ucfirst($title['name']) . ' - PAW Power';
        require $this->viewsDir . 'institucional/servCliente.view.php';
    }  

    public function prueba()
    {
        require $this->viewsDir . 'compra/prueba.php';
    }

    /*public function rutas($path)
    {
        $ruta_sin_barra = ltrim($path, '/');

        $titulo = htmlspecialchars($_GET['nombre'] ?? "PAW");
        require $this->viewsDir . $ruta_sin_barra . '.view.php';
    }*/
}