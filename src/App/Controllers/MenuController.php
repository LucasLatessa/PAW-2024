<?php

namespace Paw\App\Controllers;
use Paw\App\Models\Plato;
use Paw\Core\Controlador;

class MenuController extends Controlador
{
    public string $viewsDir; #Direccion a la vista indicada
    public function __construct(){
        parent::__construct();
    }

    #Validador de imagenes, que sean menor a 1MB
    private function validarImage($tamaño_archivo,$nombreArchivo,$archivoTemporal){
            $limite_tamaño = 1048576; // 1MB en bytes
            if ($tamaño_archivo <= $limite_tamaño) {
                $rutaDestino = __DIR__ . '/../../../public/assets/platos/' . $nombreArchivo;
                move_uploaded_file($archivoTemporal, $rutaDestino);
                return true;
            } else {
                return false;
            }
        } 

    #Creacion de platos
    public function crearPlato(){
        session_start();
        global $request;
        $nombreArchivo = $_FILES['imagen']['name'];
        $tamanioArchivo =$_FILES["imagen"]["size"];
        $archivoTemporal = $_FILES['imagen']['tmp_name'];
        if (!isset($_SESSION['login'])){
            $title = "Agregar plato - PAW Power";
            require $this->viewsDir . 'compra/platoagregado.view.php';
        }
        else{
            if ($this->validarImage($tamanioArchivo,$nombreArchivo,$archivoTemporal)){
                $nombre = $request->getRequest('nombre');
                $descripcion = $request->getRequest('descripcion');
                $precio = $request->getRequest('precio');
                $imagen = $nombreArchivo;
                $plato = new Plato($nombre,$descripcion,$precio,$imagen);
                $title = "Plato agregado - PAW Power";
                require $this->viewsDir . 'compra/platoagregado.view.php';
            }else{
                $errorMessage = "El archivo es muy pesado.";
        
                $title = "Agregar plato - PAW Power";
                require $this->viewsDir . 'compra/crearPlato.view.php';
            }
        }
        #Primero valido la imagen, que tiene que ser menor a 1MB
        
    }

}