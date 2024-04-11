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

    public function rutas($path)
    {
        $ruta_sin_barra = ltrim($path, '/');

        $titulo = htmlspecialchars($_GET['nombre'] ?? "PAW");
        require $this->viewsDir . $ruta_sin_barra . '.view.php';
    }
}