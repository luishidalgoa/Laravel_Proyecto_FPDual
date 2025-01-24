<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    //
    protected $guarded = ['id'];

    public function index()
    {
        $professors = Professor::all();
        return view('professor.index', compact('professors'));
    }
}
