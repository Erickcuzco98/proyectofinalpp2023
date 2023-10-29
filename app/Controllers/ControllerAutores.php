<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\autor1;

class ControllerAutores extends Controller
{

    public function cargarautores()
    {
        $autornuevo = new autor1();
        $datos['datos'] = $autor1->findAll(); 
        return view('crud_autores', $datos);
    }
    

    public function guardarautor1()
    {
        $id = $this->request->getVar('txt_idautor');
        $nombre = $this->request->getVar('txt_nombre');

        $insertautores = new autores1();
        $datos = [
            'id' => $idautores,
            'nombre' => $libroid,
        ];
        $autor1->insert($datos);
        return redirect()->to(base_url() . 'tablaautores');
    }

    public function eliminarautores($id = null)
    {
        $autor1 = new autor1Model();
        $autor1->delete($nombre);
        $autor1->delete($id);

        return redirect()->to(base_url() . 'tablaautores');
    }

    public function verautores($id = null)
    {
        $autor1 = new autoresModel();
        $datos['datos'] = $autores1->where('id', $autoresid)->first();
        $datos['datos'] = $autores1->where('nombre', $autoresnombre)->first();
        return view('actualizar_autores', $datos);
    }

    public function actualizarActores()
    {
        $id = $this->request->getVar('txt_idautores');
        $nombre = $this->request->getVar('txt_autores');

        
        $actuactores = new autor1
        del();
        $datoautores= [
            'id' => $autoresid,
            'nombre' => $nombreautor,
        ];

        $actuaactor->update($id,$nombre);
        return $this->cargarautor1();
    }

}