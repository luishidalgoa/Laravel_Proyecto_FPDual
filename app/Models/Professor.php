<?php

// Define el espacio de nombres para el modelo Professor
namespace App\Models;

// Importa las clases necesarias del framework Laravel
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// Define la clase Professor que extiende la clase Model de Eloquent
class Professor extends Model
{
    // Especifica los atributos que no son asignables en masa
    protected $guarded = ['id'];

    // Especifica los atributos que son asignables en masa
    protected $fillable = [
        'fullname',    // El nombre completo del profesor
        'age',         // La edad del profesor
        'gender',      // El género del profesor
        'address',     // La dirección del profesor
        'telephone',   // El número de teléfono del profesor
        'email',       // La dirección de correo electrónico del profesor
    ];

    // Define un método de relación para asociar el profesor con múltiples empresas
    public function companies(): HasMany
    {
        // Especifica que el profesor tiene muchas empresas
        return $this->hasMany(Company::class);
    }
}