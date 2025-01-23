<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $fillable = [
        'nombre', 
        'direccion', 
        'telefono', 
        'email', 
        'fecha_creacion'
    ];

    protected $hidden = ['created_at', 'updated_at'];

}
