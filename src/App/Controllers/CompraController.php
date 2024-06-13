<?php

namespace Paw\App\Controllers;

use Paw\App\Models\Reserva;
use Paw\App\Models\Carrito;
use Paw\Core\Controlador;
use Paw\Core\Request;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class CompraController extends Controlador
{
    public string $viewsDir; #Direccion a la vista indicada
    private $twig;

    public function __construct()
    {
        parent::__construct();
        $loader = new FilesystemLoader(__DIR__ . '/../../App/views');
        $this->twig = new Environment($loader);
}
    
    private function validarCarrito($nombre,$descripcion,$precio, $notas, $cantidad){
        if (empty($nombre) || empty($Descripcion) || empty($Precio) || empty($Notas) || empty($Cantidad)){            
            throw new \InvalidArgumentException("Nombre, imagen, descripción y precio son campos requeridos.");
        }
        return true;
    }



    public function selecLoc($postData)
{
    // Verificar si se ha enviado el campo del local en el formulario
    if (empty($postData['local'])) {
        // Si el campo del local está vacío, renderizar la vista de selección de local con un mensaje de error
        $data = [
            'title' => "Agregar Reserva - PAW Power",
            'errorMessage' => 'Por favor, seleccione un local.',
        ];
        echo $this->twig->render('compra/selecLoc.view.twig', $data);
    } else {
        // Si el campo del local no está vacío, obtener el local y renderizar la vista del carrito
        $local = $postData['local'];
        $data = [
            'title' => "Carrito - PAW Power",
            'local' => $local,
        ];
        echo $this->twig->render('compra/carrito.view.twig', $data);
    }}
    public function selecDirec(Request $request)
    {
        // Verificar si se ha enviado el campo de dirección en el formulario
        if (empty($request->request->get('direccion'))) {
            // Si el campo de dirección está vacío, renderizar la vista de selección de dirección con un mensaje de error
            $data = [
                'title' => "Seleccionar Dirección - PAW Power",
                'creada' => isset($_SESSION['creada']) ? $_SESSION['creada'] : null,
                'pais' => isset($_SESSION['pais']) ? $_SESSION['pais'] : null,
                'provincia' => isset($_SESSION['provincia']) ? $_SESSION['provincia'] : null,
                'ciudad' => isset($_SESSION['ciudad']) ? $_SESSION['ciudad'] : null,
                'ccpp' => isset($_SESSION['ccpp']) ? $_SESSION['ccpp'] : null,
                'direc' => isset($_SESSION['direc']) ? $_SESSION['direc'] : null,
            ];
            echo $this->twig->render('compra/selec-direccion.view.twig', $data);
        } else {
            // Si el campo de dirección no está vacío, obtener la dirección y renderizar la vista del carrito
            $direc = $request->request->get('direccion');
            $data = [
                'title' => "Carrito - PAW Power",
                'direccion' => $direc,
            ];
            echo $this->twig->render('compra/carrito.view.twig', $data);
        }
    }

    // public function crearFilaCarrito()
    // {
    //     global $request;

    //     $nombre = $request->getRequest('nombre');
    //     $descripcion = $request->getRequest('descripcion');
    //     $precio = $request->getRequest('precio');
    //     $notas = $request->getRequest('notas');
    //     $cantidad = $request->getRequest('cantidad');
    //     $pago = $request->getRequest('pago');
    //     $envio = $request->getRequest('envio');

    //     $filaCarrito = new Carrito($nombre, $descripcion, $precio, $notas, $cantidad, $pago, $envio);

    //     #No nos conviene realizarlo porque al final vamos a terminar cambiando todo porque implica BD
    // }

}