<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Tarea::orderBy('id')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $datos = $request->validate([
            'titulo' => ['required', 'string', 'min:3', 'max:255'],
        ]);

        return response()->json(Tarea::create($datos), 201);
    }

    public function completar(Tarea $tarea): JsonResponse
    {
        $tarea->marcarCompletada();

        return response()->json($tarea->fresh());
    }
}
