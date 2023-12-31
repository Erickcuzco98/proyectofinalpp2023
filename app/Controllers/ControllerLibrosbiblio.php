<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LibrosModel;
use App\Models\AutoresModel;
use App\Models\CategoriasModel;

class ControllerLibrosbiblio extends Controller
{

    public function cargarLibrosb()
    {
        $libro = new LibrosModel();
        $autoresModel = new AutoresModel();
        $categoriasModel = new CategoriasModel();
    
        $datos['datos'] = $libro->findAll();
        $datos['autores'] = $autoresModel->findAll();
        $datos['categorias'] = $categoriasModel->findAll();
        
        return view('crud_librosbiblio', $datos);
    }

    public function guardarLibrob()
    {
        $libroid = $this->request->getVar('txt_libroid');
        $titulolibro = $this->request->getVar('txt_titulolibro');
        $autor = $this->request->getVar('txt_autor');
        $categoria = $this->request->getVar('txt_categoria');
        $descripcion = $this->request->getVar('txt_descripcion');
        $anopublicacion = $this->request->getVar('txt_anopublicacion');
        $cadisponible = $this->request->getVar('txt_cadisponible');

        $insertlibro = new LibrosModel();
        $datos = [
            'libro_id' => $libroid,
            'titulo' => $titulolibro,
            'autor_id' => $autor,
            'categoria_id' => $categoria,
            'descripcion' => $descripcion,
            'anio_publicacion' => $anopublicacion,
            'cantidad_disponible' => $cadisponible
        ];
        $insertlibro->insert($datos);
        return redirect()->to(base_url() . 'tablaLibrosb');
    }

    public function eliminarLibrob($libroid = null)
    {
        $libro = new LibrosModel();
        $libro->delete($libroid);

        return redirect()->to(base_url() . 'tablaLibrosb');
    }

    public function verLibrob($libroid = null)
    {
        $libro = new LibrosModel();
        $datos['datos'] = $libro->where('libro_id', $libroid)->first();
        

        $autoresModel = new AutoresModel();
        $categoriasModel = new categoriasModel();
        $datos['autores'] = $autoresModel ->findAll();
        $datos['categorias'] = $categoriasModel ->findAll();

        $nombreAutor = $autoresModel ->find($datos['datos']['autor_id']);
        $nombreCategoria = $categoriasModel ->find($datos['datos']['categoria_id']);

        $datos['nombreAutor']=$nombreAutor['nombre'];
        $datos['nombreCategoria']=$nombreCategoria['nombre'];

        return view('actualizar_libro', $datos);
    }

    public function actualizarLibrob()
    {
        $libroid = $this->request->getVar('txt_libroid');
        $titulolibro = $this->request->getVar('txt_titulolibro');
        $autor = $this->request->getVar('txt_autor');
        $categoria = $this->request->getVar('txt_categoria');
        $descripcion = $this->request->getVar('txt_descripcion');
        $anopublicacion = $this->request->getVar('txt_anopublicacion');
        $cadisponible = $this->request->getVar('txt_cadisponible');

        $actualibro = new LibrosModel();
        $datoslibro = [
            'libro_id' => $libroid,
            'titulo' => $titulolibro,
            'autor_id' => $autor,
            'categoria_id' => $categoria,
            'descripcion' => $descripcion,
            'anio_publicacion' => $anopublicacion,
            'cantidad_disponible' => $cadisponible
        ];

        $actualibro->update($libroid, $datoslibro);
        return $this->cargarLibrosb();
    }
}