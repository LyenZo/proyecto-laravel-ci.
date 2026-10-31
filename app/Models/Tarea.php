<?php

namespace App\Models;

use Database\Factories\TareaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    /** @use HasFactory<TareaFactory> */
    use HasFactory;

    protected $fillable = ['titulo', 'completada'];

    protected $casts = ['completada' => 'boolean'];

    public function marcarCompletada(): void
    {
        $this->update(['completada' => true]);
    }
}
