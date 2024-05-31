<?php

namespace Paw\App\Controllers;
use Paw\Core\Controlador;

class ErrorController extends Controlador
{
    public string $viewsDir; #Direccion a la vista indicada
    public function __construct(){
        parent::__construct();
    }

    public function notFound(){
        http_response_code(404);
        $title = "Pagina no encontrada";
        echo $this->twig->render('not-found.view.twig', [
            'title' => $title,
            ]);
    }

    public function internalError()
    {
        http_response_code(500);
        $title = "Internal error";
        echo $this->twig->render('internal-error.view.twig', [
            'title' => $title,
            ]);
    }
}