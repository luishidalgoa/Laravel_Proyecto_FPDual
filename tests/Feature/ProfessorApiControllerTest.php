<?php

namespace Tests\Feature;

use App\Models\Professor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfessorApiControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_listar_todos_los_profesores()
    {
        // Creamos varios profesores en la base de datos
        Professor::factory()->count(5)->create();

        // Realizamos una petición GET al endpoint index
        $response = $this->getJson('/api/professors');

        // Verificamos que la respuesta sea exitosa
        $response->assertStatus(200);

        // Verificamos que se retornen 5 profesores
        $response->assertJsonCount(5, 'data');
    }

    /** @test */
    public function puede_mostrar_un_profesor_específico()
    {
        // Creamos un profesor en la base de datos
        $professor = Professor::factory()->create();

        // Realizamos una petición GET al endpoint show
        $response = $this->getJson("/api/professors/{$professor->id}");

        // Verificamos que la respuesta sea exitosa
        $response->assertStatus(200);

        // Verificamos que los datos retornados sean correctos
        $response->assertJson([
            'data' => [
                'id' => $professor->id,
                // Añade otros campos que consideres necesarios
            ],
        ]);
    }

    /** @test */
    public function puede_actualizar_un_profesor()
    {
        // Creamos un profesor en la base de datos
        $professor = Professor::factory()->create();

        // Datos para actualizar el profesor
        $datosActualizados = [
            // Añade aquí los campos que deseas actualizar
            "id" => $professor->id,
            'email' => 'nuevoemail@example.com',
            'fullname' => 'Nuevo Nombre',
            'age' => 30,
            'gender' => "male",
            'address' => '123 Main St',
            'telephone' => '123456789',
            'password' => 'password',
        ];

        // Realizamos una petición PUT al endpoint update
        $response = $this->putJson("/api/professors/{$professor->id}", $datosActualizados);

        // Verificamos que la respuesta sea exitosa
        $response->assertStatus(200);

        // Verificamos que los datos en la base de datos hayan sido actualizados
        $this->assertDatabaseHas('professors', [
            'id' => $professor->id,
            'fullname' => 'Nuevo Nombre',
            'email' => 'nuevoemail@example.com',
        ]);
    }

    /** @test */
    public function puede_eliminar_un_profesor()
    {
        // Creamos un profesor en la base de datos
        $professor = Professor::factory()->create();

        // Realizamos una petición DELETE al endpoint destroy
        $response = $this->deleteJson("/api/professors/{$professor->id}");

        // Verificamos que la respuesta sea 204 No Content
        $response->assertStatus(204);

        // Verificamos que el profesor haya sido eliminado de la base de datos
        $this->assertDatabaseMissing('professors', [
            'id' => $professor->id,
        ]);
    }
}
