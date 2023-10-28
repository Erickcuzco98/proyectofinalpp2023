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
                switch ($usuarioEncontrado['rol']) {
                    case 'estudiante':
                        return redirect()->to('dashboard_estudiante');
                    case 'bibliotecario':
                        return redirect()->to('dashboard_bibliotecario');
                    case 'administrador':
                        return redirect()->to('dashboard_administrador');
                }
            }
        }

        return view('login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
