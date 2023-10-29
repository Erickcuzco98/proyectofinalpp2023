<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LibrosModel;
use App\Models\AutoresModel;
use App\Models\CategoriasModel;

class ControllerLibros extends Controller
{

    public function cargarLibros()
    {
        $libro = new LibrosModel();
        $autoresModel = new AutoresModel();
        $categoriasModel = new CategoriasModel();
    
        $datos['datos'] = $libro->findAll();
        $datos['autores'] = $autoresModel->findAll(); // Obtén datos de autores
        $datos['categorias'] = $categoriasModel->findAll(); // Obtén datos de categorías
        
        return view('crud_libros', $datos);
    }

    public function guardarLibro()
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
        return redirect()->to(base_url() . 'tablaLibros');
    }

    public function eliminarLibro($libroid = null)
    {
        $libro = new LibrosModel();
        $libro->delete($libroid);

        return redirect()->to(base_url() . 'tablaLibros');
    }

    public function verLibro($libroid = null)
    {
        $libro = new LibrosModel();
        $datos['datos'] = $libro->where('libro_id', $libroid)->first();
        return view('actualizar_libro', $datos);
    }

    public function actualizarLibro()
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
        return $this->cargarLibros();
    }
}
