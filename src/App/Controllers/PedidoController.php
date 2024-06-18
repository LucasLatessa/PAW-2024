<?php

namespace Paw\App\Controllers;
use Paw\App\Models\PedidosCollections;
use Paw\App\Models\ReservasCollections;
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

        $reservasCollections = new ReservasCollections();
        #var_dump($this->getQb());
        $reservasCollections->setQueryBuilder($this->getQb());
        $reservas = $reservasCollections->getAll();

        #var_dump($pedidos);
        $title = 'Gestion de consumo - PAW Power';
        echo $this->twig->render('cuenta/consumos.view.twig', [
            'title' =>  $title,
            'pedidos' => $pedidos,
            'reservas' => $reservas,
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
    /*--------- TURNERA ------------*/
    public function turnosPantalla()
    {
        $pedidos = $this->model->getAll();
        $title = 'Turnos local - PAW Power';
        echo $this->twig->render('turnero/turnos.view.twig',[
            'title' =>  $title,
            'pedidos' =>$pedidos,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);

    }
    
     /*--------- ESTADOS COCINA ------------*/
    public function displayEstadosCocina()
    {   
        $pedidos = $this->model->getPedidosEstadosCocina();
        $title = 'Estados Cocina- PAW Power';
        echo $this->twig->render('cocina/displayEstadosCocina.view.twig', [
            'title' =>  $title,
            'pedidos' =>$pedidos,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
    }
    public function getPedidos() {
        $pedidos = $this->model->getAll();
    
        $pedidosData = [];
        foreach ($pedidos as $pedido) {
            $pedidosData[] = [
                'id' => $pedido->getId(),
                'estado' => $pedido->getEstado()
            ];
        }
    
        header('Content-Type: application/json');
        echo json_encode($pedidosData);
    }
    public function getPedidosCocina() {
        $pedidos = $this->model->getPedidosEstadosCocina();
        //var_dump($pedidos);
        $pedidosData = [];
        foreach ($pedidos as $pedido) {
            $items = [];
     
            foreach ($pedido->getElementos() as $elemento) {
                $itemData = [
                    'nombre' => $elemento->getNombre(),
                    'descripcion' => $elemento->getDescripcion(),
                    'aclaraciones' => $elemento->getAclaraciones()
                ];
                $items[] = $itemData;
            }
    
            $pedidosData[] = [
                'numero' => $pedido->getId(),
                'hora' => $pedido->getFecha_pedido(),
                'estado' => $pedido->getEstado(),
                'items' => $items
            ];
        } 
        //var_dump($pedidosData);
        header('Content-Type: application/json');
        echo json_encode($pedidosData); 
    }

    public function changePedido() {
        $pedidoId = isset($_GET['pedidoId']) ? $_GET['pedidoId'] : null;
        $jsonData = json_decode(file_get_contents('php://input'), true);
        $nuevoEstado = isset($jsonData['estado']) ? $jsonData['estado'] : null;
    
        if (empty($pedidoId) || empty($nuevoEstado)) {
            error_log("Datos inválidos: Pedido ID o Estado están vacíos.");
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'error' => 'Datos inválidos']);
            return;
        }
    
        error_log("ID del pedido: " . $pedidoId);
        error_log("Nuevo estado: " . $nuevoEstado);
    
        $actualizado = $this->model->actualizarPedido($pedidoId, $nuevoEstado);
    
        $respuesta = [
            'success' => $actualizado
        ];
    
        header('Content-Type: application/json');
        echo json_encode($respuesta);
    }
      

    
    

}