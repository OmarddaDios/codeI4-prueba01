<?php

namespace App\Models;

use CodeIgniter\Model;

class PeliculaModel extends Model
{
    protected $table = 'peliculas';
    protected $primarykey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['titulo', 'descripcion'];


}
