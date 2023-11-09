<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class AuthController extends BaseController
{
    public function login()
    {
        $usuarioModel = new UsuarioModel();
        $error_message = null;

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
                    case 'autores':
                            return redirect()->to('dashboard_administrador');
                }
            } else {
                $error_message = "Nombre de usuario o contraseña incorrecta";
            }
        }

        return view('login', ['error_message' => $error_message]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}

