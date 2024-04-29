<?php

namespace Paw\App\Controllers;
use Paw\App\Models\Direccion;
use Paw\Core\Controlador;
class CuentaController extends Controlador{

    public string $viewsDir; #Direccion a la vista indicada
    public function __construct(){
        parent::__construct();
    }
    public function validarDireccion($request) {
        $errores = [];

        // Validar el código postal
        $codigoPostal = $request->getRequest('ccpp');
        if (!preg_match('/^\d{4}$/', $codigoPostal)) {
            $errores['ccpp'] = "El código postal debe tener 4 dígitos numéricos.";
        }

        return $errores;
    }
    private function redirigir() {
        // Iniciar sesión si aún no está iniciada
        session_start();

        // Redirigir al usuario a la página de origen
        if (isset($_SESSION['origen'])) {
            return $_SESSION['origen'];
        } else {
            return null;
        }
    }
    public function crearDireccion() {
        global $request;

        $errores = $this->validarDireccion($request);

        if (empty($errores)) {
            $pais= $request->getRequest('pais');
            $provincia= $request->getRequest('provincia');
            $ciudad= $request->getRequest('ciudad');
            $ccpp= $request->getRequest('ccpp');
            $direc= $request->getRequest('direccion');
            $aclaraciones= $request->getRequest('aclaraciones');
            $direccion=new Direccion($pais,$provincia,$ciudad,$ccpp,$direc,$aclaraciones);
            $title = "Direccion agregada - PAW Power";
            $creada = "Direccion creada!";
            require __DIR__ . '/../views/' . $this->redirigir() . '.view.php';


            //require __DIR__ . '/../views/cuenta/perfil.view.php';
        } else {
            $title = "Agregar Dirección - PAW Power";
            require __DIR__ . '/../views/cuenta/agregarDireccion.view.php';
        }
    }
}
