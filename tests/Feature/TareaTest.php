<?php

namespace Tests\Feature;

use App\Models\Tarea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TareaTest extends TestCase
{
    use RefreshDatabase;

    public function test_se_puede_crear_una_tarea(): void
    {
        $this->postJson('/tareas', ['titulo' => 'Estudiar CI'])
            ->assertCreated()
            ->assertJsonPath('titulo', 'Estudiar CI');

        $this->assertDatabaseHas('tareas', ['titulo' => 'Estudiar CI']);
    }

    public function test_el_titulo_es_obligatorio(): void
    {
        $this->postJson('/tareas', [])
            ->assertStatus(422)
            ->assertJsonValidationErrors('titulo');
    }

    public function test_se_pueden_listar_las_tareas(): void
    {
        Tarea::factory()->count(3)->create();

        $this->getJson('/tareas')
            ->assertOk()
            ->assertJsonCount(3);
    }

    public function test_se_puede_marcar_una_tarea_como_completada(): void
    {
        $tarea = Tarea::factory()->create();

        $this->patchJson("/tareas/{$tarea->id}/completar")
            ->assertOk()
            ->assertJsonPath('completada', true);
    }

    public function test_un_titulo_demasiado_corto_devuelve_422(): void
    {
        $this->postJson('/tareas', ['titulo' => 'ab'])
            ->assertStatus(422)
            ->assertJsonValidationErrors('titulo');
    }
}