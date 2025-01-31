<?php
// Define el espacio de nombres para el modelo Company
namespace App\Models;

// Importa las clases necesarias del framework Laravel
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// Define la clase Company que extiende la clase Model de Eloquent
class Company extends Model
{
    // Especifica los atributos que son asignables en masa
    protected $fillable = [
        'name',          // El nombre de la empresa
        'address',       // La dirección de la empresa
        'telephone',     // El número de teléfono de la empresa
        'email',         // La dirección de correo electrónico de la empresa
        'date_creation', // La fecha de creación de la empresa
        'professor_id',  // El ID del profesor asociado
    ];

    // Define un método de relación para asociar la empresa con un profesor
    public function professor(): BelongsTo
    {
        // Especifica que la empresa pertenece a un profesor
        return $this->belongsTo(Professor::class);
    }
}