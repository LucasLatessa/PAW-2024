<?php

namespace Paw\App\Controllers;
use Paw\Core\Controlador;


class PageController extends Controlador
{
    public string $viewsDir; #Direccion a la vista indicada
    public function __construct(){
        parent::__construct();
    }

    public function index()
    {
        $title = 'Home - PAW Power';
        require $this->viewsDir . 'index.view.php';
    }

    /*--------------COMPRA------------------*/

    public function menu()
    {
        $title = 'Menu - PAW Power';
        require $this->viewsDir . 'compra/menu.view.php';
    }

    public function carrito()
    {
        $title = 'Carrito - PAW Power';
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
        $title = 'Reserva - PAW Power';
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
        $title = 'Gestion de consumo - PAW Power';
        require $this->viewsDir . 'cuenta/consumos.view.php';
    }

    public function login()
    {
        $title = 'Login - PAW Power';
        require $this->viewsDir . 'cuenta/login.view.php';
    }

    public function perfil()
    {
        $title = 'Perfil - PAW Power';
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
        $title = 'Locales - PAW Power';
        require $this->viewsDir . 'institucional/locales.view.php';
    }

    public function nosotros()
    {
        $title = 'Sobre nosotros - PAW Power';
        require $this->viewsDir . 'institucional/nosotros.view.php';
    }

    public function servCliente()
    {
        $title = 'Servicio al cliente - PAW Power';
        require $this->viewsDir . 'institucional/servCliente.view.php';
    }  
}