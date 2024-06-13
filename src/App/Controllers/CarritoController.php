<?php

namespace Paw\App\Controllers;
use Paw\App\Models\CarritoCollections;
use Paw\Core\Controlador;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class CarritoController extends Controlador {
    
    public ?string $modelName = CarritoCollections::class;
    public string $viewsDir;
    private $twig;
    public function __construct()
    {
        parent::__construct();
        $loader = new FilesystemLoader(__DIR__ . '/../../App/views');
        $this->twig = new Environment($loader);
    }

    private function validarPedido($cantidadDelPedido){
        if ($cantidadDelPedido < 1) {
            throw new \InvalidArgumentException("La cantidad de pedido debe ser mayor a 1.");
        }
        return true;
    }

    // public function crearPedido(){
    //     global $request;
    //     unset($_SESSION['mensaje_pedido']);
    
    //     # Inicializar el mensaje como vacío
    //     $mensajePedido = '';
    //     # Procesar el formulario de pedido
    //     if($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         # Obtener las salsas seleccionadas
    //         $salsas = [];
    //         if(isset($_POST['bbq'])) {
    //             $salsas[] = 'bbq';
    //         }
    //         if(isset($_POST['mostaza'])) {
    //             $salsas[] = 'mostaza';
    //         }
    //         if(isset($_POST['ketchup'])) {
    //             $salsas[] = 'ketchup';
    //         }
    //         if(isset($_POST['mayonesa'])) {
    //             $salsas[] = 'mayonesa';
    //         }
    
    //         $aclaraciones = $request->getRequest('aclaracionesPedir');
    //         $cantidad = $request->getRequest('cantidadHamburguesa');
                      
    //         # Validar el pedido
    //         if ($this->validarPedido($cantidad)) {
    //             # Crear un objeto Pedido con los detalles del pedido
    //             $pedido = new Pedido($salsas, $aclaraciones, $cantidad); //ver si el precio lo adjunto dentro del constructor 
    //             # Agregar el pedido a la matriz de pedidos temporales
    //             $this->pedidos[] = $pedido;
    //             $title = "Pedido agregado" . ' - PAW Power';
    //             $mensajePedido = 'Pedido agregado a su carrito.';  
    //         } else {
    //             $title = "Pedir comida" . ' - PAW Power';
    //         }
    //     }
    //     $mensajePedido = 'Pedido agregado a su carrito.'; // Esto es un ejemplo, puedes ajustarlo según lo que necesites.
    //     echo $this->twig->render('compra/pedirComida.twig', ['mensajePedido' => $mensajePedido]);
    // }

    public function crearPedido(){

        session_start();

        // Verificar si el usuario está logueado
        if (!isset($_SESSION['login'])) {
            // Si no está logueado, redirigir al login
            header('Location: /cuenta/login');
            exit();
        }

        global $request;

        $idPlato = $request->get('id');

        $aclaraciones = $request->get('aclaracionesPedir');

        $cantidad = $request->getRequest('cantidadHamburguesa');

        $idSesion = session_id();

        //ID del usuario
        $idUsuario = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : null;

        $this->model->create($idPlato, $aclaraciones,$cantidad, $idSesion, $idUsuario);

        #$title = "Pedido agregado - PAW Power";

        // Redirigir a la URL del carrito después de crear el pedido
        header('Location: /compra/carrito');
        exit();

        #echo $this->twig->render('cuenta/perfil.view.twig', ['title' => $title]);
    }

    public function carrito()
    {
        global $request;
        $title = 'Carrito - PAW Power';

        session_start();
        $idSesion = session_id();

        //ID del usuario
        $idUsuario = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : null;

        // Obtener el carrito para la sesión actual
        $carrito = $this->model->getAll($idSesion,$idUsuario);
        
        var_dump($idUsuario);

        echo $this->twig->render('compra/carrito.view.twig', [
            'title' =>  $title,
            'carrito' => $carrito,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
    }

    public function borrarProducto(){
        global $request;

        $id = $request->get('id');

        $this->model->borrar($id);

        // #echo $this->twig->render('index.view.twig', [
        //     'rutasMenuBurger' => $this->rutasMenuBurger,
        //     'rutasLogoHeader' => $this->rutasLogoHeader, 
        //     'rutasHeaderDer' => $this->rutasHeaderDer, 
        //     'rutasFooter' => $this->rutasFooter, 
        // ]);

        header('Location: /compra/carrito');
        exit();
    }
}
