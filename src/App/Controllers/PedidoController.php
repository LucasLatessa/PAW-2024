<?php

namespace Paw\App\Controllers;
use Paw\App\Models\PedidosCollections;
use Paw\Core\Controlador;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class PedidoController extends Controlador {

    public ?string $modelName = PedidosCollections::class;
    public string $viewsDir;
    private $twig;
    public function __construct()
    {
        parent::__construct();
        $loader = new FilesystemLoader(__DIR__ . '/../../App/views');
        $this->twig = new Environment($loader);
    }

    public function verConsumos()
    {
        $pedidos = $this->model->getAll();

        //var_dump($pedidos);
        $title = 'Gestion de consumo - PAW Power';
        echo $this->twig->render('cuenta/consumos.view.twig', [
            'title' =>  $title,
            'pedidos' => $pedidos,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);

    }

    public function crearPedido()
    {
        global $request;
        session_start();

        //$formaPago = $request->getRequest('nombre');
        //$descripcion = $request->getRequest('descripcion');
        //$precio = $request->getRequest('precio');
        
        $idSesion = session_id();

        //ID del usuario
        $idUsuario = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : null;
        var_dump($idUsuario);

        $pedido = $this->model->create($idSesion,$idUsuario);

        // Redirigir a la URL del carrito después de crear el pedido
        //var_dump($pedido);
        header('Location: /');
        exit();
    }

}