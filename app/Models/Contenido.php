<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CarpetasAcademica;

class Contenido extends Model
{
    use HasFactory;

    protected $table = 'contenidos';

    protected $fillable = [
        'titulo',
        'descripcion',
        'archivo',
        'estado',
        'carpeta_academicas_id',
        'users_id',
    ];

    public function carpetaAcademica()
    {
        return $this->belongsTo(CarpetasAcademica::class, 'carpeta_academicas_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
