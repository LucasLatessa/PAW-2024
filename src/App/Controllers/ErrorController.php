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
        require $this->viewsDir . 'not-found.view.php';
    }

    public function internalError()
    {
        http_response_code(500);
        $title = "Internal error";
        require $this->viewsDir . 'internal-error.view.php';
    }
}