<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Professor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test de registro de usuario y profesor.
     */
    public function test_register_user_and_professor()
    {
        $userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'age' => 30,
            'gender' => 'male',
            'address' => $this->faker->address,
            'telephone' => '123456789',
        ];

        $response = $this->postJson('/api/register', $userData);

        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'message',
                     'user' => [
                         'id',
                         'name',
                         'email',
                     ],
                     'professor' => [
                         'user_id',
                         'fullname',
                         'email',
                         'age',
                         'gender',
                         'address',
                         'telephone',
                     ],
                 ]);

        $this->assertDatabaseHas('users', [
            'email' => $userData['email'],
        ]);

        $this->assertDatabaseHas('professors', [
            'email' => $userData['email'],
        ]);
    }

    /**
     * Test de login de usuario.
     */
    public function test_login_user()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);

        $loginData = [
            'email' => $user->email,
            'password' => 'password123',
        ];

        $response = $this->postJson('/api/login', $loginData);

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'access_token',
                     'token_type',
                     'user' => [
                         'id',
                         'name',
                         'email',
                     ],
                     'professor',
                 ]);
    }

    /**
     * Test de logout de usuario.
     */
    public function test_logout_user()
    {
        $user = User::factory()->create();
        $token = $user->createToken('auth_token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/logout');

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Logout exitoso']);

        $this->assertCount(0, $user->tokens);
    }

    /**
     * Test de obtención de usuario autenticado.
     */
    public function test_get_authenticated_professor()
    {
        // Crear un usuario
        $user = User::factory()->create();
    
        // Crear un profesor asociado al usuario
        $professor = Professor::factory()->create([
            'user_id' => $user->id,
        ]);
    
        // Generar token de autenticación
        $token = $user->createToken('auth_token')->plainTextToken;
    
        // Hacer la solicitud para obtener los datos del profesor autenticado
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/professor');
    
        // Verificar que la respuesta es exitosa (código 200)
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'id',
                     'name',
                     'email',
                     'email_verified_at',
                     'current_team_id',
                     'profile_photo_path',
                     'created_at',
                     'updated_at',
                     'two_factor_confirmed_at',
                     'profile_photo_url',
                 ])
                 ->assertJson([
                     'id' => $user->id,
                     'name' => $user->name,
                     'email' => $user->email,
                 ]);
    }
}
