<?php

namespace Paw\App\Controllers;

class PageController
{
    public string $viewsDir; #Direccion a la vista indicada

    public function __construct()
    {
        $this->viewsDir = __DIR__ . "/../views/";

        $this->rutas = [
            /* Menu hamburguesa 0-2*/ 
            [
                "href" => '/compra/menu',
                "name" => "Menu",
            ],
            [
                "href" => '/compra/reserva',
                "name" => "Reserva mesa",
            ],
            [
                "href" => './cuenta/perfil',
                "name" => "Perfil"
            ],
            /*Logo header 3*/
            [
                "href" => '/index',
                "name" => "Home",
            ],
            /*Header parte derecha 4-5*/
            [
                "href" => '/compra/carrito',
                "name" => "carrito"
            ],
            [
                "href" => '/cuenta/login',
                "name" => "usuario"
            ],
            /*Footer 6-9*/
            [
                "href" => '/institucional/locales',
                "name" => "Locales"
            ],
            [
                "href" => '/institucional/servCliente',
                "name" => "Servicio alcliente"
            ],
            [
                "href" => '/institucional/nosotros',
                "name" => "Sobre nosotros"
            ],
            [
                "href" => '/cuenta/consumos',
                "name" => "Consumos"
            ]
        ];
    }

    public function index()
    {
        $titulo = htmlspecialchars($_GET['nombre'] ?? "PAW");
        require $this->viewsDir . 'index.view.php';
    }

    /*--------------COMPRA------------------*/

    public function menu()
    {
        require $this->viewsDir . 'compra/menu.view.php';
    }

    public function carrito()
    {
        require $this->viewsDir . 'compra/carrito.view.php';
    }

    public function confirmarCompra()
    {
        require $this->viewsDir . 'compra/confirmarCompra.view.php';
    }

    public function pedirComida()
    {
        require $this->viewsDir . 'compra/pedirComida.view.php';
    }

    public function reserva()
    {
        require $this->viewsDir . 'compra/reserva.view.php';
    }

    public function selecDirec()
    {
        require $this->viewsDir . 'compra/selecDirec.view.php';
    }

    public function selecLoc()
    {
        require $this->viewsDir . 'compra/selecLoc.view.php';
    }

    /*--------------CUENTA------------------*/

    public function agregarDireccion()
    {
        require $this->viewsDir . 'cuenta/agregarDireccion.view.php';
    }

    public function consumos()
    {
        require $this->viewsDir . 'cuenta/consumos.view.php';
    }

    public function login()
    {
        require $this->viewsDir . 'cuenta/login.view.php';
    }

    public function perfil()
    {
        require $this->viewsDir . 'cuenta/perfil.view.php';
    }

    public function registrarse()
    {
        require $this->viewsDir . 'cuenta/registrarse.view.php';
    }

    /*--------------INSTITUCIONAL------------------*/

    public function locales()
    {
        require $this->viewsDir . 'institucional/locales.view.php';
    }

    public function nosotros()
    {
        require $this->viewsDir . 'institucional/nosotros.view.php';
    }

    public function servCliente()
    {
        require $this->viewsDir . 'institucional/servCliente.view.php';
    }

    /*public function rutas($path)
    {
        $ruta_sin_barra = ltrim($path, '/');

        $titulo = htmlspecialchars($_GET['nombre'] ?? "PAW");
        require $this->viewsDir . $ruta_sin_barra . '.view.php';
    }*/
}