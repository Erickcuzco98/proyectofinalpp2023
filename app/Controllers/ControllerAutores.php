<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AutoresModel;

class ControllerAutores extends Controller
{

    public function cargarAutores()
    {
        $autor = new AutoresModel();
        $datos['datos'] = $autor->findAll(); 
        return view('crud_autores', $datos);
    }
    

    public function guardarAutor()
    {
        $nombre = $this->request->getVar('txt_nombre');

        $insertautor = new AutoresModel();
        $datos = [
            'nombre' => $nombre
        ];
        $insertautor->insert($datos);
        return redirect()->to(base_url() . 'tablaAutores');
    }

    public function eliminarAutor($autorid = null)
    {
        $autor = new AutoresModel();
        $autor->delete($autorid);

        return redirect()->to(base_url() . 'tablaAutores');
    }

    public function verAutor($autorid = null)
    {
        $autor = new AutoresModel();
        $datos['datos'] = $autor->where('autor_id', $autorid)->first();
        return view('actualizar_autores', $datos);
    }

    public function actualizarAutor()
    {
        $autorid = $this->request->getVar('txt_id');
        $nombre = $this->request->getVar('txt_nombre');
        
        $actuaautor = new AutoresModel();
        $datosautor = [
            'autor_id' => $autorid,
            'nombre' => $nombre
        ];

        $actuaautor->update($autorid, $datosautor);
        return $this->cargarAutores();
}
}