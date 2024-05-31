<?php

namespace Paw\App\Controllers;
use Paw\Core\Controlador;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class PageController extends Controlador
{
    private $twig;

    public function __construct()
    {
        parent::__construct();
        $loader = new FilesystemLoader(__DIR__ . '/../../App/views');
        $this->twig = new Environment($loader);
}

    public function index()
    {
        $title = 'Home - PAW Power';
        echo $this->twig->render('index.view.twig', [
            'title' =>  $title,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
    }

    /*--------------COMPRA------------------*/

    public function menu()
    {
        $title = 'Menu - PAW Power';
        echo $this->twig->render('compra/menu.view.twig',[
            'title' =>  $title,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
    }

    public function carrito()
    {
        $title = 'Carrito - PAW Power';
        echo $this->twig->render('compra/carrito.view.twig', [
            'title' =>  $title,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
    }

    public function confirmarCompra()
    {
        $title = "Confirmar compra" . ' - PAW Power';
        echo $this->twig->render('compra/confirmarCompra.view.twig',  [
            'title' =>  $title,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
        }

    public function pedirComida()
    {
        $title = "Pedir comida" . ' - PAW Power';
        echo $this->twig->render('compra/pedirComida.view.twig',  [
            'title' =>  $title,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
    }

    public function reserva()
    {
        $title = 'Reserva - PAW Power';
        echo $this->twig->render('compra/reserva.view.twig', [
            'title' =>  $title,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
        }

    public function selecDirec()
    {
        $title = "Seleccionar direccion" . ' - PAW Power';
        echo $this->twig->render('compra/selecDirec.view.twig',  [
            'title' =>  $title,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
    }

    public function selecLoc()
    {
        $title = "Seleccionar local" . ' - PAW Power';
        echo $this->twig->render('compra/selecLoc.view.twig',  [
            'title' =>  $title,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
    }

    public function crearPlato()
    {
        $title = "Crear plato" . ' - PAW Power';
        echo $this->twig->render('compra/crearPlato.view.twig', [
            'title' =>  $title,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
    }

    /*--------------CUENTA------------------*/

    public function agregarDireccion()
    {
        $title = "Agregar direccion" . ' - PAW Power';
        echo $this->twig->render('cuenta/agregarDireccion.view.twig', [
            'title' =>  $title,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
    }

    public function consumos()
    {
        $title = 'Gestion de consumo - PAW Power';
        echo $this->twig->render('cuenta/consumos.view.twig', [
            'title' =>  $title,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
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
            'errorMessage' => isset($_SESSION['errorMessage']) ? $_SESSION['errorMessage'] : null,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
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
            'title' =>  $title,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
    }

    public function registrarse()
    {
        $title = "Registrarse" . ' - PAW Power';
        echo $this->twig->render('cuenta/registrarse.view.twig',[
            'title' =>  $title,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
    }

    /*--------------INSTITUCIONAL------------------*/

    public function locales()
    {
        $title = 'Locales - PAW Power';
        echo $this->twig->render('institucional/locales.view.twig', [
            'title' =>  $title,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
    }


    public function nosotros()

    {
        $title = 'Sobre nosotros - PAW Power';
        echo $this->twig->render('institucional/nosotros.view.twig',[
            'title' =>  $title,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
    }

    public function servCliente()
    {
        $title = 'Servicio al cliente - PAW Power';
        echo $this->twig->render('institucional/servCliente.view.twig', [
            'title' =>  $title,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
        }  

    /*--------- TURNERA ------------*/
    public function turnosPantalla()
    {
        $title = 'Turnos local - PAW Power';
        echo $this->twig->render('turnero/turnos.view.twig',[
            'title' =>  $title,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);

    }
    
     /*--------- ESTADOS COCINA ------------*/
    public function displayEstadosCocina()
    {   
        $title = 'Estados Cocina- PAW Power';
        echo $this->twig->render('cocina/displayEstadosCocina.view.twig', [
            'title' =>  $title,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
    }
}