<?php

namespace Paw\App\Controllers;
use Paw\App\Models\Direccion;
use Paw\App\Models\UsuariosCollections;
use Paw\Core\Controlador;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class UsuarioController extends Controlador{ 
    private $usuariosJSON = __DIR__ . "/../data/usuarios.json";
    public ?string $modelName = UsuariosCollections::class;
    public string $viewsDir; #Direccion a la vista indicada
    private $twig;
    public function __construct()
    {
        parent::__construct();
        $loader = new FilesystemLoader(__DIR__ . '/../../App/views');
        $this->twig = new Environment($loader);
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
        $usuario = $this->model->create($nombre,$apellido, $email, $contraseña);
        $resultado = "¡Cuenta creada!";
        $title = "Perfil" . ' - PAW Power';
        echo $this->twig->render('cuenta/perfil.view.twig', [
            'title' => $title,
            'resultado' => $resultado
        ]);
        
    }else{
        $errorMessage = "Las contranseñas no coinciden"; 
        $title = "Registrarse" . ' - PAW Power';
        echo $this->twig->render('cuenta/registrarse.view.twig', [
            'title' => $title,
            'errorMessage' => $errorMessage
        ]);
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
            echo $this->twig->render('cuenta/login.view.twig', [
                'title' => $title,
                'errorMessage' => $errorMessage
            ]);
        #Reviso que exista dentro del sistema
        }elseif (empty($this->getUsuario($email,$contraseña))){
            $errorMessage = "Credenciales incorrectas";
            $title = "Login" . ' - PAW Power';
            echo $this->twig->render('cuenta/login.view.twig', [
                'title' => $title,
                'errorMessage' => $errorMessage
            ]);
        } else {
            $this->sesionLogeo();
        }

        #Faltaria agregar validaciones con la BD para comprobar que existe esa instancia

    }
    public function logout(){        
        global $request;
        session_start();
        if (isset($_SESSION['login'])){
            $_SESSION = [];
            setcookie(session_name(),'',time() - 10000);
            session_destroy();
            $title = "Logout" . ' - PAW Power';
            $errorMessage = "Deslogueado";
            echo $this->twig->render('cuenta/login.view.twig', [
                'title' => $title,
                'errorMessage' => $errorMessage
            ]);
        }
        else{
            $title = "Logout" . ' - PAW Power';
            $errorMessage = "Error al desloguearte!";
            echo $this->twig->render('cuenta/login.view.twig', [
                'title' => $title,
                'errorMessage' => $errorMessage
            ]);
        }
    }

    #Actualizar perfil, que esta en el perfil
    public function actualizarPerfil(){
        global $request;
    
        # Obtengo los datos de la petición
        $email = $request->getRequest("email");
        $nombre = $request->getRequest("nombre");
        $apellido = $request->getRequest("apellido");
    
        # Validación de correo "Solo formato a@a.com"
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $resultado = "Email inválido!";
        } else {
            $resultado = "¡Perfil actualizado!";
        }
        $title = "Perfil" . ' - PAW Power';
        
        echo $this->twig->render('cuenta/perfil.view.twig', ['title' => $title, 'resultado' => $resultado]);
        
        # Faltaría agregar validaciones con la BD para realizar el intercambio
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
        echo $this->twig->render('cuenta/login.view.twig', [
            'title' => $title,
            'resultado' => $resultado,
            'hayLogin' =>  $hayLogin 
        ]);
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
            echo $this->twig->render(__DIR__ . '/../views/' . $this->redirigir() . '.view.twig', ['title' => $title]);


            //require __DIR__ . '/../views/cuenta/perfil.view.php';
        } else {
            $title = "Agregar Dirección - PAW Power";
            echo $this->twig->render(__DIR__ . '/../views/cuenta/agregarDireccion.view.twig', ['title' => $title]);
        }
    }

    public function getUsuario($email,$contraseña){
        $usuarioEmail = $email;
        $usuarioContraseña = $contraseña;

        
        $usuario = $this->model->get($usuarioEmail,$usuarioContraseña);
        return $usuario;

    }

}