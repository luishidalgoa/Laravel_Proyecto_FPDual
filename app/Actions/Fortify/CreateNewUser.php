<?php
namespace App\Actions\Fortify;

use App\Models\Professor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Valida y crea un nuevo usuario registrado, junto con su perfil de profesor.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Validación de datos
        Validator::make($input, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'age' => ['required', 'integer', 'min:18', 'max:100'],
            'gender' => ['required', 'in:male,female,other'],
            'address' => ['required', 'string', 'max:150'],
            'telephone' => ['required', 'string', 'max:9', 'regex:/^[0-9]{9}$/'],
        ], [
            'telephone.regex' => 'El teléfono debe contener exactamente 9 dígitos numéricos.',
            'gender.in' => 'Seleccione un género válido.'
        ])->validate();

        // Creación del usuario
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        // Creación del profesor relacionado
        Professor::create([
            'user_id' => $user->id,
            'fullname' => $input['name'],
            'age' => $input['age'],
            'gender' => $input['gender'],
            'address' => $input['address'],
            'telephone' => $input['telephone'],
            'email' => $input['email'],
        ]);

        return $user;
    }
}