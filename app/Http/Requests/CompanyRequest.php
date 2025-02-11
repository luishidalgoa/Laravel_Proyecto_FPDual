<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    /**
     * 
     * Define las reglas de validación para los datos de la empresa.
     * @return array{address: string, date_creation: string, email: string, name: string, professor_id: string, telephone: string}
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'address' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'date_creation' => 'nullable|date',
            'professor_id' => 'nullable|integer|exists:professors,id',
        ];
    }
}