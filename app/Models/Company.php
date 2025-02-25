<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importa el trait HasFactory
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use HasFactory; // Usa el trait HasFactory

    protected $fillable = [
        'name',
        'address',
        'telephone',
        'email',
        'date_creation',
        'professor_id',
    ];

    public function professor(): BelongsTo
    {
        return $this->belongsTo(Professor::class);
    }
}
