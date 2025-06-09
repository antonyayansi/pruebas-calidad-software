<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'aulas_id',
        'cursos_id',
        'docentes_id',
        'estado',
        'tipo',
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class, 'aulas_id');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'cursos_id');
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'docentes_id');
    }
}
