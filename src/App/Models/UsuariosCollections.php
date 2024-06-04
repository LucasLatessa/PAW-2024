<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Paw\App\Models\Usuario;

class UsuariosCollections extends Model
{
    public $table = 'usuario';

    public function getAll()
    {

        $usuarios = $this->queryBuilder->select($this->table);
        $usuariosCollection = [];
        foreach ($usuarios as $usuario) {
            $nuevaReserva = new Usuario();
            $nuevaReserva->set($usuario);
            $usuariosCollection[] = $nuevaReserva;
        }
        return $usuariosCollection;
    }

    public function get($usuarioEmail, $usuarioContraseña)
    {
        $usuario = new Usuario;
        $usuario->setQueryBuilder($this->queryBuilder);

        $usuario->load($usuarioEmail, $usuarioContraseña);
        if (empty($usuario->getCorreo())) {
            return "";
        } else
            return $usuario;

    }





    public function create($nombre, $apellido, $correo, $contraseña)
    {
        $newUsuario = new Usuario;

        $data = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'correo' => $correo,
            'contraseña' => $contraseña,
        ];

        $newUsuario->setQueryBuilder($this->queryBuilder);
        $newUsuario->set($data);

        $this->queryBuilder->insert($this->table, $data);
        return $newUsuario;

    }

}