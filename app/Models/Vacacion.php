<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'duracion'
    ];

    protected $casts = [
        'fecha_inicio' => 'datetime:Y-m-d',
    ];

    
}
