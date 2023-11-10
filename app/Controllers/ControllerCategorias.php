<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoriasModel;

class ControllerCategorias extends Controller
{

    public function cargarCategoria()
    {
        $categoria = new CategoriasModel();
        $datos['datos'] = $categoria->findAll(); 
        return view('crud_categorias', $datos);
    }
    
    public function guardarCategoria()
    {
        $categoriaid = $this->request->getVar('txt_categoriaid');
        $nombrecategoria = $this->request->getVar('txt_nombre');

        $insertcategoria = new CategoriasModel();
        $datos = [
            'categoria_id' => $categoriaid,
            'nombre' => $nombrecategoria
        ];
        $insertcategoria->insert($datos);
        return redirect()->to(base_url() . 'tablaCategorias');
    }

    public function eliminarCategoria($categoriaid = null)
    {
        $categoria = new CategoriasModel();
        $categoria->delete($categoriaid);

        return redirect()->to(base_url() . 'tablaCategorias');
    }

    public function verCategoria($categoriaid = null)
    {
        $categoria = new CategoriasModel();
        $datos['datos'] = $categoria->where('categoria_id', $categoriaid)->first();
        return view('actualizar_categorias', $datos);
    }

    public function actualizarCategoria()
    {
        $categoriaid = $this->request->getVar('txt_id');
        $nombre = $this->request->getVar('txt_nombre');
        
        $actuacategoria = new CategoriasModel();
        $datoscategoria = [
            'categoria_id' => $categoriaid,
            'nombre' => $nombre
        ];

        $actuacategoria->update($categoriaid, $datoscategoria);
        return $this->cargarCategoria();
}

}