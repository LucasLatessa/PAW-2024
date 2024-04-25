<?php

namespace Paw\App\Controllers;
use Paw\App\Models\Plato;

class MenuController
{
    public string $viewsDir; #Direccion a la vista indicada
    public function __construct(){

        
        $this->viewsDir = __DIR__ . "/../views/";

        $this->rutas = [
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
            ],
            /*Logo header 3*/
            [
                "href" => '../',
                "name" => "Home",
            ],
            /*Header parte derecha 4-5*/
            [
                "href" => '../compra/carrito',
                "name" => "carrito",
            ],
            [
                "href" => '../cuenta/login',
                "name" => "usuario"
            ],
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
    

    public function crearPlato(){

        global $request;

        $nuevoPlato = [
            'nombre' => $request->getRequest('nombre'),
            'descripcion'  => $request->getRequest('descripcion'),
            'precio'  => $request->getRequest('precio'),
            'foto'  => $request->getRequest('imagen'),
        ];

        #$nuevoPlato = new Plato($nombre, $descripcion, $precio);
        $plato = new Plato($nuevoPlato);
        $title = $this->rutas[0]; #Hardoceado
        $title = ucfirst($title['name']) . ' - PAW Power';
        require $this->viewsDir . 'compra/menu.view.php';
    }

}