<?php

namespace Paw\App\Controllers;
use Paw\Core\Controlador;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class PageController extends Controlador
{
    public string $viewsDir; #Direccion a la vista indicada
    private $twig;
    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../App/views');
        $this->twig = new Environment($loader);
    }

    public function index()
    {
        $title = 'Home - PAW Power';
        echo $this->twig->render('index.view.twig', ['title' =>  $title]);
    }

    /*--------------COMPRA------------------*/

    public function menu()
    {
        $title = 'Menu - PAW Power';
        echo $this->twig->render('compra/menu.view.twig', ['title' => $title]);
    }

    public function carrito()
    {
        $title = 'Carrito - PAW Power';
        echo $this->twig->render('compra/carrito.view.twig', ['title' => $title]);
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
        echo $this->twig->render('compra/reserva.view.twig', ['title' => $title]);
        }

    public function selecDirec()
    {
        $title = "Seleccionar direccion" . ' - PAW Power';
        require $this->viewsDir . 'compra/selecDirec.view.php';
    }

    public function selecLoc()
    {
        $title = "Seleccionar local" . ' - PAW Power';
        require $this->viewsDir . 'compra/selecLoc.view.twig';
    }

    public function crearPlato()
    {
        $title = "Crear plato" . ' - PAW Power';
        echo $this->twig->render('compra/crearPlato.view.twig', ['title' => $title]);
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
        session_start();
        $title = 'Login - PAW Power';
        if (!isset($_SESSION['login'])) {
            $_SESSION['login'] = "";
        }
        $hayLogin = $_SESSION['login'];

        echo $this->twig->render('cuenta/login.view.twig', [
            'title' => $title,
            'hayLogin' => $hayLogin,
            'errorMessage' => isset($_SESSION['errorMessage']) ? $_SESSION['errorMessage'] : null
        ]);
        
        // Clear the error message after rendering
        if (isset($_SESSION['errorMessage'])) {
            unset($_SESSION['errorMessage']);
        }
    }

    public function perfil()
    {
        $title = 'Perfil - PAW Power';
        echo $this->twig->render('cuenta/perfil.view.twig', [
            'title' => $title,
            ]);
    }

    public function registrarse()
    {
        $title = "Registrarse" . ' - PAW Power';
        echo $this->twig->render('cuenta/registrarse.view.twig', [
            'title' => $title,
            ]);
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

    /*--------- TURNERA ------------*/
    public function turnosPantalla()
    {
        $title = 'Turnos local - PAW Power';
        require $this->viewsDir . 'turnero/turnos.view.php';
    }
    /*--------- COCINA ------------*/
    public function displayCocina()
    {
        $title = 'Cocina- PAW Power';
        require $this->viewsDir . 'cocina/displayCocina.view.php';
    }


     /*--------- ESTADOS COCINA ------------*/
    public function displayEstadosCocina()
    {   
        $title = 'Estados Cocina- PAW Power';
        require $this->viewsDir . 'cocina/displayEstadosCocina.view.php';
    }
}