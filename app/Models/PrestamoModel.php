<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestamoModel extends Model
{
    protected $table = 'prestamos';
    protected $primaryKey = 'prestamo_id';
    protected $allowedFields = ['usuario_id', 'libro_id', 'fecha_prestamo', 'fecha_devolucion'];
}