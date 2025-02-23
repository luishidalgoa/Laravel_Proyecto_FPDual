<?php

namespace Database\Seeders;

use App\Models\Professor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProfessorSeeder extends Seeder
{
    public function run(): void
    {
        // Crear usuarios primero
        $users = [
            [
                'name' => 'Antonio Marin',
                'email' => 'pamarin@iesfranciscodelosrios.es',
                'password' => 'password123',
                'professor_data' => [
                    'age' => 40,
                    'gender' => 'male',
                    'address' => 'calle falsa 123',
                    'telephone' => '675662991'
                ]
            ],
            [
                'name' => 'Maria Lopez',
                'email' => 'mlopez@iesfranciscodelosrios.es',
                'password' => 'password123',
                'professor_data' => [
                    'age' => 35,
                    'gender' => 'female',
                    'address' => 'avenida siempre viva 742',
                    'telephone' => '612345678'
                ]
            ],
            [
                'name' => 'Juan Perez',
                'email' => 'jperez@iesfranciscodelosrios.es',
                'password' => 'password123',
                'professor_data' => [
                    'age' => 50,
                    'gender' => 'male',
                    'address' => 'calle del sol 456',
                    'telephone' => '698765432'
                ]
            ],
            [
                'name' => 'Laura Sanchez',
                'email' => 'lsanchez@iesfranciscodelosrios.es',
                'password' => 'password123',
                'professor_data' => [
                    'age' => 28,
                    'gender' => 'female',
                    'address' => 'plaza mayor 789',
                    'telephone' => '677889900'
                ]
            ]
        ];

        foreach ($users as $userData) {
            // Crear usuario
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make($userData['password'])
            ]);

            // Crear profesor relacionado
            Professor::create([
                'user_id' => $user->id,
                'fullname' => $userData['name'],
                'email' => $userData['email'],
                ...$userData['professor_data']
            ]);
        }
    }
}