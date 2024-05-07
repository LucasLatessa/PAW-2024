<?php

namespace Paw\App\Controllers;

use Paw\App\Models\Reserva;
use Paw\App\Models\Carrito;
use Paw\Core\Controlador;


class CompraController extends Controlador
{
    public string $viewsDir; #Direccion a la vista indicada
    public function __construct(){
        parent::__construct();
    }
    
    private function validarCarrito($nombre,$descripcion,$precio, $notas, $cantidad){
        if (empty($nombre) || empty($Descripcion) || empty($Precio) || empty($Notas) || empty($Cantidad)){            
            throw new \InvalidArgumentException("Nombre, imagen, descripción y precio son campos requeridos.");
        }
        return true;
    }



    public function selecLoc(){
        global $request;

        // Verificar si se ha enviado el campo del local en el formulario
        if (empty($request->getRequest('local'))) {
            // Si el campo del local está vacío, redirigir de vuelta al formulario con un mensaje de error
            $title = "Agregar Reserva - PAW Power";
            require $this->viewsDir . 'compra/selecLoc.view.php';
        } else{
            $local=$request->getRequest('local');
            $title = "Carrito - PAW Power";
            require $this->viewsDir . 'compra/carrito.view.php';
        }
}
    public function selecDirec(){
        global $request;

        // Verificar si se ha enviado el campo del local en el formulario
        if (empty($request->getRequest('direccion'))) {
            // Si el campo del local está vacío, redirigir de vuelta al formulario con un mensaje de error
            $title = "Seleccionar Direccion - PAW Power";
            require $this->viewsDir . 'compra/selecDirec.view.php';
        } else{
            $direc=$request->getRequest('direccion');
            $title = "Carrito - PAW Power";
            require $this->viewsDir . 'compra/carrito.view.php';
        }
}

    public function crearFilaCarrito(){
        global $request;

        $nombre = $request->getRequest('nombre');
        $descripcion = $request->getRequest('descripcion');
        $precio = $request->getRequest('precio');
        $notas = $request->getRequest('notas');
        $cantidad = $request->getRequest('cantidad');
        if ($this -> validarCarrito($nombre,$descripcion,$precio, $notas, $cantidad)){
            $filaCarrito = new Carrito($nombre,$descripcion,$precio, $notas, $cantidad);
            require $this -> viewsDir . 'compra/carrito.view.php';
        }
        
    }

}