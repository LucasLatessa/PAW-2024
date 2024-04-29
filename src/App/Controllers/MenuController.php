<?php

namespace Paw\App\Controllers;
use Paw\App\Models\Plato;

class MenuController
{
    public string $viewsDir; #Direccion a la vista indicada
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

    public function crearPlato(){
        global $request;
        $nombreArchivo = $_FILES['imagen']['name'];
        $tamanioArchivo =$_FILES["imagen"]["size"];
        $archivoTemporal = $_FILES['imagen']['tmp_name'];
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

}