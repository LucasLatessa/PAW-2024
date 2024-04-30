<?php

namespace Paw\App\Controllers;
use Paw\App\Models\Pedido;

class PedidoController {
    public string $viewsDir;
    private $pedidos = []; // Almacenar los pedidos temporales,antes de pagar el carrito
    
    public function __construct(){
        $this->viewsDir = __DIR__ . "/../views/";
        $this->rutasMenuBurger = [
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
            ]
            ];
        $this->rutasLogoHeader =
            /*Logo header 3*/
            [
                "href" => '../',
                "name" => "Home",
            ];
        $this->rutasHeaderDer = [
            /*Header parte derecha 4-5*/
            [
                "href" => '../compra/carrito',
                "name" => "carrito",
            ],
            [
                "href" => '../cuenta/login',
                "name" => "usuario"
            ],
        ];
        $this->rutasFooter = [
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
