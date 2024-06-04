<?php

namespace Paw\App\Controllers;
use Paw\App\Models\Plato;
use Paw\Core\Controlador;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class MenuController extends Controlador
{
    public string $viewsDir; #Direccion a la vista indicada
    private $twig;
    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../App/views');
        $this->twig = new Environment($loader);
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
    public function crearPlato()
    {
        global $request;
        session_start();
        $nombreArchivo = $_FILES['imagen']['name'];
        $tamanioArchivo = $_FILES["imagen"]["size"];
        $archivoTemporal = $_FILES['imagen']['tmp_name'];

        # Primero valido la imagen, que tiene que ser menor a 1MB
        if (!isset($_SESSION['login'])){
            $title = "Agregar plato - PAW Power";
            $errorMessage = "usuario no logeado";

            echo $this->twig->render('compra/crearPlato.view.twig', [
                'title' => $title,
                'errorMessage' => $errorMessage
            ]);
        }
        else{
            if ($this->validarImage($tamanioArchivo, $nombreArchivo, $archivoTemporal)) {
                print_r($_SESSION['login']);
                $nombre = $request->getRequest('nombre');
                $descripcion = $request->getRequest('descripcion');
                $precio = $request->getRequest('precio');
                $imagen = $nombreArchivo;
                $plato = new Plato($nombre, $descripcion, $precio, $imagen);

                $title = "Plato agregado - PAW Power";
                echo $this->twig->render('compra/platoagregado.view.twig', [
                    'title' => $title,
                    'plato' => $plato
                ]);
            } else {
                $errorMessage = "El archivo es muy pesado.";
                $title = "Agregar plato - PAW Power";
                echo $this->twig->render('compra/crearPlato.view.twig', [
                    'title' => $title,
                    'errorMessage' => $errorMessage
                ]);
            }
        }
    }

}