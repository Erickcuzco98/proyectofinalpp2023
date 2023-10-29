<?php

namespace App\Models;

use CodeIgniter\Model;

class LibrosModel extends Model
{
    protected $table = 'libros';
    protected $primaryKey = 'libro_id';
    protected $allowedFields = ['titulo', 'autor_id', 'categoria_id', 'descripcion', 'anio_publicacion', 'cantidad_disponible'];
}