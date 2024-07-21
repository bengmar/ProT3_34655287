<?php

namespace App\Models;

use CodeIgniter\Model;

class usuario_Model extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = [
        'apellido', 'nombre', 'email', 'usuario',
        'pass', 'provincia', 'codigo_postal', 'perfil_id',
        'baja'
    ];
}
