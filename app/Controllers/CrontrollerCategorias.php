<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\categoriaModel;

class ControllerCategorias extends Controller
{

    public function cargarcategoria()
    {
        $categoria1 = new categoriaModel();
        $datos['datos'] = $categoria1->findAll(); 
        return view('crud_categorias', $datos);
    }
    

    public function guardarcategorias()
    {
        $id_categoria = $this->request->getVar('txt_ide');
        $nombre_categoria = $this->request->getVar('txt_nombre');

        $insertcategoria = new categoriaModel();
        $datos = [
            'id' => $id_categoria,
            'nombre' => $nombre_categoria,
        ];
        $insertcategoria->insert($datos);
        return redirect()->to(base_url() . 'tablacategorias');
    }

    public function eliminarcategoria($id_categoria = null)
    {
        $categoria1 = new categoriaModel();
        $categoria1->delete($id_categoria);

        return redirect()->to(base_url() . 'tablacategorias');
    }

    public function vercategoria($id_categoria = null)
    {
        $categoria1 = new categoriaModel();
        $datos['datos'] = $usuario->where('usuario_id', $usuarioid)->first();
        return view('actualizar_categoria', $datos);
    }

    public function actualizarcategoria()
    {
        $id_categoria = $this->request->getVar('txt_idcat');
        $nombre_categoria = $this->request->getVar('txt_nombrecat');
        $actuacategoria = new categoriaModel();
        $datoscategoria = [
            'id' => $id_categoria,
            'nombre' => $nombre_categoria
        ];

        $actuacategoria->update($id_categoria,$datoscategoria);
        return $this->cargarcategoria();
    }
}