<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;

class ControllerUsuarios extends Controller
{

    public function cargarUsuarios()
    {
        $usuario = new UsuarioModel();
        $datos['datos'] = $usuario->findAll(); 
        return view('crud_usuarios', $datos);
    }
    

    public function guardarUsuario()
    {
        $nombre = $this->request->getVar('txt_nombre');
        $apellido = $this->request->getVar('txt_apellido');
        $nombre_usuario = $this->request->getVar('txt_nombre_usuario');
        $correo = $this->request->getVar('txt_correo');
        $contrasena = $this->request->getVar('txt_contra');
        $rol = $this->request->getVar('txt_rol');

        $insertusuario = new UsuarioModel();
        $datos = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'nombre_usuario' => $nombre_usuario,
            'correo' => $correo,
            'contrasena' => $contrasena,
            'rol' => $rol
        ];
        $insertusuario->insert($datos);
        return redirect()->to(base_url() . 'tablaUsuarios');
    }

    public function eliminarUsuario($usuarioid = null)
    {
        $usuario = new UsuarioModel();
        $usuario->delete($usuarioid);

        return redirect()->to(base_url() . 'tablaUsuarios');
    }

    public function verUsuario($usuarioid = null)
    {
        $usuario = new UsuarioModel();
        $datos['datos'] = $usuario->where('usuario_id', $usuarioid)->first();
        return view('actualizar_usuario', $datos);
    }

    public function actualizarUsuario()
    {
        $usuarioid = $this->request->getVar('txt_id');
        $nombre = $this->request->getVar('txt_nombre');
        $apellido = $this->request->getVar('txt_apellido');
        $nombre_usuario = $this->request->getVar('txt_nombre_usuario');
        $correo = $this->request->getVar('txt_correo');
        $contrasena = $this->request->getVar('txt_contra');
        $rol = $this->request->getVar('txt_rol');
        
        $actuausuario = new UsuarioModel();
        $datosusuario = [
            'usuario_id' => $usuarioid,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'nombre_usuario' => $nombre_usuario,
            'correo' => $correo,
            'contrasena' => $contrasena,
            'rol' => $rol
        ];

        $actuausuario->update($usuarioid,$datosusuario);
        return $this->cargarUsuarios();
    }
}