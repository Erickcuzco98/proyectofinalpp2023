<?php

namespace App\Models;

use CodeIgniter\Model;

class AutoresModel extends Model
{
    protected $table = 'autores';
    protected $primaryKey = 'autor_id';
    protected $allowedFields = ['nombre'];
}