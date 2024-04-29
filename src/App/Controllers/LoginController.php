<?php

namespace Paw\App\Controllers;
use Paw\App\Models\Usuario;
use Paw\Core\Controlador;

class LoginController extends Controlador{ 
    private $usuariosJSON = __DIR__ . "/../data/usuarios.json";
    public string $viewsDir; #Direccion a la vista indicada
    public function __construct(){
        parent::__construct();
    }

    public function registrarse(){

        global $request;

        #Obtengo los datos de la peticion
        $nombre = $request->getRequest("nombre");
        $apellido = $request->getRequest("apellido");
        $email = $request->getRequest("email");
        $contraseña = $request->getRequest("contraseña");
        $validarcontraseña = $request->getRequest("validarContraseña");

    if($contraseña == $validarcontraseña){
        $usuario = new Usuario($nombre,$apellido,$email,$contraseña);
        $resultado = "¡Cuenta creada!";
        $title = "Perfil" . ' - PAW Power';
        require $this->viewsDir . 'cuenta/perfil.view.php';
    }else{
        $errorMessage = "Las contranseñas no coinciden"; 
        $title = "Registrarse" . ' - PAW Power';
        require $this->viewsDir . 'cuenta/registrarse.view.php';
    }
    
    }

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

    public function login(){
        global $request;

        #Obtengo los datos de la peticion
        $email = $request->getRequest("email");
        $contraseña = $request->getRequest("contraseña");
        
        #Obtengo los datos de todos los usuarios para corrobar que exista
        $usuarios = json_decode(file_get_contents($this->usuariosJSON), true);

        #Validacion de correo "Solo formato a@a.com"
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMessage = "Email invalido!";
            $title = "Login" . ' - PAW Power';
            require $this->viewsDir . 'cuenta/login.view.php';
        #Reviso que exista dentro del sistema
        }elseif (!$this->buscadorUsuarios($usuarios,$email,$contraseña)){
            $errorMessage = "Credenciales incorrectas";
            $title = "Login" . ' - PAW Power';
            require $this->viewsDir . 'cuenta/login.view.php';
        } else {
            $title = "Perfil" . ' - PAW Power';
            $resultado = "¡Logeado!";
            require $this->viewsDir . 'cuenta/perfil.view.php';
        }

        #Faltaria agregar validaciones con la BD para comprobar que existe esa instancia

    }

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

}