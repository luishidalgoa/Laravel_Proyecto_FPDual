<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     */
    public function rules(): array
    {
        return [
            'fullname' => 'required|string|max:100',
            'age' => 'required|integer|min:18|max:100',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:150',
            'telephone' => 'required|string|max:9',
            'email' => 'required|email|unique:professors,email,' . $this->professor,
        ];
    }
}
