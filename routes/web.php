<?php

use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tareas', [TareaController::class, 'index']);
Route::post('/tareas', [TareaController::class, 'store']);
Route::patch('/tareas/{tarea}/completar', [TareaController::class, 'completar']);
