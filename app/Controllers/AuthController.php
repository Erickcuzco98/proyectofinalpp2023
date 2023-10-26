<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class AuthController extends BaseController
{
    public function login()
    {
        $usuarioModel = new UsuarioModel();

        if ($this->request->getMethod() === 'post') {
            $nombre_usuario = $this->request->getVar('nombre_usuario');
            $contrasena = $this->request->getVar('contrasena');

            $usuarioEncontrado = $usuarioModel->where('nombre_usuario', $nombre_usuario)
                ->where('contrasena', $contrasena)
                ->first();

            if ($usuarioEncontrado) {
                // Inicio de sesión exitoso
                // Redirige al dashboard según el rol
                switch ($usuarioEncontrado['rol']) {
                    case 'estudiante':
                        return view('dashboard_estudiante');
                    case 'bibliotecario':
                        return view('dashboard_bibliotecario');
                    case 'administrador':
                        return view('dashboard_administrador');
                }
            }
        }

        return view('login');
    }

    public function logout()
    {
        // Destruye la sesión
        session()->destroy();
        return redirect()->to('login');
    }
}
