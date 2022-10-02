<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'duracion',
        'fecha_inicio',
        'sueldo',
        'cargo_id',
        'horario_id',
        'vacacion_id',
    ];

    protected $casts = [
        'fecha_inicio' => 'datetime:d-m-Y',
    ];

    // El contrato le pertenece a un empleado
    public function empleado()
    {
        return $this->hasOne(Empleado::class);
    }

    // Le pertenece un Cargo
    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    // Se registra la vacacion 
    public function vacacion()
    {
        return $this->hasOne(Vacacion::class);
    }

    // Se le asigna un horario
    public function horario() 
    {
        return $this->belongsTo(Horario::class);
    }

}
