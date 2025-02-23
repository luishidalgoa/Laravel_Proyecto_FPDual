<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Professor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyApiControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_can_list_all_companies()
    {
        // Crear 3 compañías con profesores asociados
        Company::factory()->count(3)->create();

        // Hacer la solicitud GET al endpoint
        $response = $this->getJson('/api/companies');

        // Verificar que la respuesta es exitosa (código 200)
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data' => [
                         '*' => [
                             'id',
                             'name',
                             'address',
                             'telephone',
                             'email',
                             'date_creation',
                             'professor_id',
                         ],
                     ],
                 ]);
    }

    /** @test */
    public function it_can_create_a_company()
    {
        // Crear un profesor para asociarlo a la compañía
        $professor = Professor::factory()->create();

        // Datos para crear la compañía
        $companyData = [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'date_creation' => $this->faker->date,
            'professor_id' => $professor->id,
        ];

        // Hacer la solicitud POST al endpoint
        $response = $this->postJson('/api/companies', $companyData);

        // Verificar que la respuesta es exitosa (código 201)
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data' => [
                         'id',
                         'name',
                         'address',
                         'telephone',
                         'email',
                         'date_creation',
                         'professor_id',
                     ],
                 ]);

        // Verificar que la compañía se ha creado en la base de datos
        $this->assertDatabaseHas('companies', [
            'name' => $companyData['name'],
            'email' => $companyData['email'],
        ]);
    }

    /** @test */
    public function it_can_show_a_company()
    {
        // Crear una compañía con un profesor asociado
        $company = Company::factory()->create();

        // Hacer la solicitud GET al endpoint
        $response = $this->getJson("/api/companies/{$company->id}");

        // Verificar que la respuesta es exitosa (código 200)
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data' => [
                         'id',
                         'name',
                         'address',
                         'telephone',
                         'email',
                         'date_creation',
                         'professor_id',
                     ],
                 ]);
    }

    /** @test */
    public function it_can_update_a_company()
    {
        // Crear una compañía
        $company = Company::factory()->create();

        // Datos para actualizar la compañía
        $updateData = [
            'name' => 'Updated Company Name',
            'address' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
            'email' => 'updated@example.com',
            'date_creation' => $this->faker->date,
            'professor_id' => $company->professor_id,
        ];

        // Hacer la solicitud PUT al endpoint
        $response = $this->putJson("/api/companies/{$company->id}", $updateData);

        // Verificar que la respuesta es exitosa (código 200)
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data' => [
                         'id',
                         'name',
                         'address',
                         'telephone',
                         'email',
                         'date_creation',
                         'professor_id',
                     ],
                 ]);

        // Verificar que la compañía se ha actualizado en la base de datos
        $this->assertDatabaseHas('companies', [
            'id' => $company->id,
            'name' => 'Updated Company Name',
            'email' => 'updated@example.com',
        ]);
    }

    /** @test */
    public function it_can_delete_a_company()
    {
        // Crear una compañía
        $company = Company::factory()->create();

        // Hacer la solicitud DELETE al endpoint
        $response = $this->deleteJson("/api/companies/{$company->id}");

        // Verificar que la respuesta es exitosa (código 204)
        $response->assertStatus(204);

        // Verificar que la compañía se ha eliminado de la base de datos
        $this->assertDatabaseMissing('companies', [
            'id' => $company->id,
        ]);
    }
}