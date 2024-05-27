<?php

namespace Paw\App\Controllers;
use Paw\App\Models\Direccion;
use Paw\App\Models\UsuariosCollections;
use Paw\Core\Controlador;

class UsuarioController extends Controlador{ 
    private $usuariosJSON = __DIR__ . "/../data/usuarios.json";
    public ?string $modelName = UsuariosCollections::class;
    public string $viewsDir; #Direccion a la vista indicada
    public function __construct(){
        parent::__construct();
    }

    #Registro de usuarios
    public function registrarse(){


        global $request;

        #Obtengo los datos de la peticion
        $nombre = $request->getRequest("nombre");
        $apellido = $request->getRequest("apellido");
        $email = $request->getRequest("email");
        $contraseña = $request->getRequest("contraseña");
        $validarcontraseña = $request->getRequest("validarContraseña");

    if($contraseña == $validarcontraseña){
        $reserva = $this->model->create($nombre,$apellido, $email, $contraseña);
        $resultado = "¡Cuenta creada!";
        $title = "Perfil" . ' - PAW Power';
        require $this->viewsDir . 'cuenta/perfil.view.php';
    }else{
        $errorMessage = "Las contranseñas no coinciden"; 
        $title = "Registrarse" . ' - PAW Power';
        require $this->viewsDir . 'cuenta/registrarse.view.php';
    }
    
    }

    #Funcion privada que busca dentro de mi JSON si existe un usuario
    private function buscadorUsuarios($misUsuarios,$email,$contraseña){
        $usuarioEncontrado = false;
        foreach ($misUsuarios['usuarios'] as $usuario) {
            if ($usuario['email'] === $email && $usuario['contraseña'] === $contraseña) {
                $usuarioEncontrado = true;
                break;
            }
        }
        return $usuarioEncontrado;
    }

    #Login
    public function login(){
        global $request;

        #Obtengo los datos de la peticion
        $email = $request->getRequest("email");
        $contraseña = $request->getRequest("contraseña");
        
        #Obtengo los datos de todos los usuarios para corrobar que exista
        #$usuarios = json_decode(file_get_contents($this->usuariosJSON), true); ya no lo usamos, tenemos db
        #Validacion de correo "Solo formato a@a.com"
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMessage = "Email invalido!";
            $title = "Login" . ' - PAW Power';
            require $this->viewsDir . 'cuenta/login.view.php';
        #Reviso que exista dentro del sistema
        }elseif (empty($this->getUsuario($email,$contraseña))){
            $errorMessage = "Credenciales incorrectas";
            $title = "Login" . ' - PAW Power';
            require $this->viewsDir . 'cuenta/login.view.php';
        } else {
            $this->sesionLogeo();
        }

        #Faltaria agregar validaciones con la BD para comprobar que existe esa instancia

    }
    public function logout(){
        print_r("saefsef");
        global $request;
        $cerrarSesion = isset($_GET['session']);
        $haySesion = session_status() == PHP_SESSION_ACTIVE;
        if ($cerrarSesion && $haySesion){
            $_SESSION = [];
            setcookie(session_name(),'',time() - 10000);
            session_destroy();
        }
        $title = "Logout" . ' - PAW Power';

        require $this->viewsDir . 'cuenta/login.view.php';
    }

    #Actualizar perfil, que esta en el perfil
    public function actualizarPerfil(){
        global $request;

        #Obtengo los datos de la peticion
        $email = $request->getRequest("email");
        $nombre = $request->getRequest("nombre");
        $apellido = $request->getRequest("apellido");

        #Validacion de correo "Solo formato a@a.com"
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $resultado = "Email invalido!";
        } else {
            $resultado = "¡Perfil actualizado!";
        }
        $title = "Perfil" . ' - PAW Power';
        
        require $this->viewsDir . 'cuenta/perfil.view.php';

        #Faltaria agregar validaciones con la BD para realizar el intercambio
    }

    #Validar direccion que agrega el usuario
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

    private function sesionLogeo(){
        session_start();
        if (isset($_POST['login'])){
            $_SESSION['login'] = $_POST['email'];

        }

        $hayLogin = isset($_SESSION['login']);
        if ($hayLogin){         
            $email = $_SESSION['login'];
        }
        $title = "Perfil" . ' - PAW Power';
        $resultado = "¡Logeado!";
        require $this->viewsDir . 'cuenta/login.view.php';
    }
    #Crear/Agregar direccion
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

    public function getUsuario($email,$contraseña){
        $usuarioEmail = $email;
        $usuarioContraseña = $contraseña;


        $usuario = $this->model->get($usuarioEmail,$usuarioContraseña);
        return $usuario;

    }

}