<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PrestamoModel;
use App\Models\LibrosModel;
use App\Models\UsuarioModel;


class ControllerPrestamos extends Controller
{

    public function cargarPrestamos()
    {
        $prestamo = new PrestamoModel();
        $usuariosModel = new UsuarioModel();
        $librosModel = new LibrosModel();

        $datos['datos'] = $prestamo->findAll(); 
        $datos['usuarios'] = $usuariosModel->findAll();
        $datos['libros'] = $librosModel->findAll();
        
        return view('crud_prestamos', $datos);
    }
    

    public function guardarPrestamo()
    {
        $usuarioid = $this->request->getVar('txt_usuarioid');
        $libroid = $this->request->getVar('txt_libroid');
        $fechaprestamo = $this->request->getVar('txt_fechaprestamo');
        $fechadevolucion = $this->request->getVar('txt_fechadevolucion');

        $insertprestamo = new PrestamoModel();
        $datos = [
            'usuario_id' => $usuarioid,
            'libro_id' => $libroid,
            'fecha_prestamo' => $fechaprestamo,
            'fecha_devolucion' => $fechadevolucion
        ];
        $insertprestamo->insert($datos);
        return redirect()->to(base_url() . 'tablaPrestamos');
    }

    public function eliminarPrestamo($prestamoid = null)
    {
        $prestamo = new PrestamoModel();
        $prestamo->delete($prestamoid);

        return redirect()->to(base_url() . 'tablaPrestamos');
    }

    public function verPrestamo($prestamoid = null)
    {
        $prestamo = new PrestamoModel();
        $datos['datos'] = $prestamo->where('prestamo_id', $prestamoid)->first();
    
        $usuariosModel = new UsuarioModel();
        $librosModel = new LibrosModel();
        $datos['usuarios'] = $usuariosModel->findAll();
        $datos['libros'] = $librosModel->findAll();

        $nombreUsuario = $usuariosModel->find($datos['datos']['usuario_id']); 
        $nombreLibro = $librosModel->find($datos['datos']['libro_id']); 
    
        $datos['nombreUsuario'] = $nombreUsuario['nombre'];
        $datos['nombreLibro'] = $nombreLibro['titulo'];
    
        return view('actualizar_prestamo', $datos);
    }

    public function actualizarPrestamo()
    {
        $prestamoid = $this->request->getVar('txt_prestamoid');
        $usuarioid = $this->request->getVar('txt_usuarioid');
        $libroid = $this->request->getVar('txt_libroid');
        $fechaprestamo = $this->request->getVar('txt_fechaprestamo');
        $fechadevolucion = $this->request->getVar('txt_fechadevolucion');
        
        $actuaprestamo = new PrestamoModel();
        $datosprestamo = [
            'prestamo_id' => $prestamoid,
            'usuario_id' => $usuarioid,
            'libro_id' => $libroid,
            'fecha_prestamo' => $fechaprestamo,
            'fecha_devolucion' => $fechadevolucion
        ];

        $actuaprestamo->update($prestamoid,$datosprestamo);
        return $this->cargarPrestamos();
    }

}