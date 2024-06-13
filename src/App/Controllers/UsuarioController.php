<?php

namespace Paw\App\Controllers;
use Paw\App\Models\Direccion;
use Paw\App\Models\UsuariosCollections;
use Paw\Core\Controlador;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class UsuarioController extends Controlador{ 
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
        $contraHash = password_hash($request->getRequest("contraseña"),PASSWORD_DEFAULT);
        $usuario = $this->model->create($nombre,$apellido, $email, $contraHash);
        $resultado = "¡Cuenta creada!";
        header('Location: /');
        exit();
        
    }else{
        $errorMessage = "Las contranseñas no coinciden"; 
        $title = "Registrarse" . ' - PAW Power';
        echo $this->twig->render('cuenta/registrarse.view.twig', [
            'title' => $title,
            'errorMessage' => $errorMessage,
            'rutasMenuBurger' => $this->rutasMenuBurger,
            'rutasLogoHeader' => $this->rutasLogoHeader, 
            'rutasHeaderDer' => $this->rutasHeaderDer, 
            'rutasFooter' => $this->rutasFooter, 
        ]);
    }
    
    }

    #Login
    public function login(){
        global $request;

        #Obtengo los datos de la peticion
        $email = $request->getRequest("email");
        $contraseña = $request->getRequest("contraseña");
        var_dump($email);

        #Obtengo los datos de la BD par aver si existe
        $usuario = $this->model->get($email);

        #Compruebo que exista en el sistema
        var_dump($usuario);
        #var_dump($usuario->getContraseña());
        if ($usuario && password_verify($contraseña,$usuario->getContraseña())){
            // Iniciar sesión
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['username'] = $usuario->getCorreo();
            $_SESSION['usuario_id'] = $usuario->getId(); 

            // Redirigir al perfil del usuario
            header('Location: /cuenta/perfil');
            exit();
        } else {
            $errorMessage = "Credenciales incorrectas";
            $title = "Login" . ' - PAW Power';
            echo $this->twig->render('cuenta/login.view.twig', [
                'title' => $title,
                'errorMessage' => $errorMessage,
                'rutasMenuBurger' => $this->rutasMenuBurger,
                'rutasLogoHeader' => $this->rutasLogoHeader, 
                'rutasHeaderDer' => $this->rutasHeaderDer, 
                'rutasFooter' => $this->rutasFooter,
            ]);
        }
    }
    
    public function logout(){        
        global $request;
        session_start();
        if (isset($_SESSION['login'])){
            #Vacio el array de sesion
            $_SESSION = [];

            #Obtener los parametros de la cookie de sesion
            $params = session_get_cookie_params();

            // Establecer la cookie de sesión con una fecha de expiración en el pasado
            setcookie(session_name(), '', time() - 42000,
                $params['path'], $params['domain'],
                $params['secure'], $params['httponly']
            );

            #Destruir la sesion
            session_destroy();
            
            $title = "Logout" . ' - PAW Power';
            $errorMessage = "Deslogueado";
            header('Location: /');
            exit();
            // echo $this->twig->render('cuenta/login.view.twig', [
            //     'title' => $title,
            //     'errorMessage' => $errorMessage
            // ]);
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
        // $title = "Perfil" . ' - PAW Power';
        // $resultado = "¡Logeado!";
        // echo $this->twig->render('cuenta/login.view.twig', [
        //     'title' => $title,
        //     'resultado' => $resultado,
        //     'hayLogin' =>  $hayLogin 
        // ]);
        header('Location: /cuenta/perfil');
        exit();
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

}