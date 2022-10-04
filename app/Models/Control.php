<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;

    protected $fillable = [
        'hora',
        'estado',
        'latitud',
        'longitud',
        'empleado_id',
        'servicio_id',
    ];
}
