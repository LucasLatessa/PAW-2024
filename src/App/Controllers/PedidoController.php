<?php

namespace Paw\App\Controllers;
use Paw\App\Models\Pedido;
use Paw\Core\Controlador;

class PedidoController extends Controlador {
    public string $viewsDir;
    private $pedidos = []; // Almacenar los pedidos temporales,antes de pagar el carrito
    public function __construct(){
        parent::__construct();
    }

    private function validarPedido($cantidadDelPedido){
        if ($cantidadDelPedido < 1) {
            throw new \InvalidArgumentException("La cantidad de pedido debe ser mayor a 1.");
        }
        return true;
    }

    public function crearPedido(){
        global $request;
        unset($_SESSION['mensaje_pedido']);

        # Inicializar el mensaje como vacío
        $mensajePedido = '';
        # Procesar el formulario de pedido
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            # Obtener las salsas seleccionadas
            $salsas = [];
            if(isset($_POST['bbq'])) {
                $salsas[] = 'bbq';
            }
            if(isset($_POST['mostaza'])) {
                $salsas[] = 'mostaza';
            }
            if(isset($_POST['ketchup'])) {
                $salsas[] = 'ketchup';
            }
            if(isset($_POST['mayonesa'])) {
                $salsas[] = 'mayonesa';
            }

            $aclaraciones = $request->getRequest('aclaracionesPedir');
            $cantidad = $request->getRequest('cantidadHamburguesa');
                      
            # Validar el pedido
            if ($this->validarPedido($cantidad)) {
                # Crear un objeto Pedido con los detalles del pedido
                $pedido = new Pedido($salsas, $aclaraciones, $cantidad); //ver si el precio lo adjunto dentro del constructor 
                # Agregar el pedido a la matriz de pedidos temporales
                $this->pedidos[] = $pedido;
                $title = "Pedido agregado" . ' - PAW Power';
                $mensajePedido = 'Pedido agregado a su carrito.';  
            } else {
                $title = "Pedir comida" . ' - PAW Power';
            }
        }
           require $this->viewsDir . 'compra/pedirComida.view.php';
    }

    # Método para obtener los pedidos temporales
    public function getPedidos(){
        return $this->pedidos;
    }
}
