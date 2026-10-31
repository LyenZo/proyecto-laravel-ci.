<?php

namespace Tests\Feature;

use App\Models\Tarea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TareaModeloTest extends TestCase
{
    use RefreshDatabase;

    public function test_marcar_completada_actualiza_la_base_de_datos(): void
    {
        $tarea = Tarea::factory()->create(['completada' => false]);

        $tarea->marcarCompletada();

        $this->assertDatabaseHas('tareas', ['id' => $tarea->id, 'completada' => true]);
    }
}
