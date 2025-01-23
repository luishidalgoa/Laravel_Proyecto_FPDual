<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {
    protected $table = 'companys';

    protected $fillable = [
        'name', 
        'address', 
        'telephone', 
        'email', 
        'date_creation'
    ];

    protected $hidden = ['created_at', 'updated_at'];

}