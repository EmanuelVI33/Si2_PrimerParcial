<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'ci',
        'fecha_nacimiento',
        'telefono',
        'estado',
        'image',
        'user_id',
        'contrato_id',
    ];

    // Formatos
    protected $casts = [
        'date_birth' => 'datetime:Y-m-d',
    ];

    public function contrato() {
        return $this->hasOne(Contrato::class);
    }
}
