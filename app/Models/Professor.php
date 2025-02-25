<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'age',
        'gender',
        'address',
        'telephone',
        'email'  // Eliminamos el password aquí
    ];

    // Relación con User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relación con Companies (mantenida)
    public function companies(): HasMany
    {
        return $this->hasMany(Company::class);
    }
}