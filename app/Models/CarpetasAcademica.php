<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarpetasAcademica extends Model
{

    protected $table = 'carpetas_academicas';

    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'resultados',
        'estado',
        'cursos_id',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'cursos_id');
    }
    
}
