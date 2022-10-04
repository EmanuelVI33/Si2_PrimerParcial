<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'total',
        'estado',
        'direccion_servicio_id',
        'nota_servicio_id',
        'cliente_id',
        'fumigacion_id'
    ];

    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }

    public function direccion()
    {
        return $this->hasOne(DireccionServicio::class);
    }

    public function notaServico()
    {
        return $this->hasOne(NotaServicio::class);
    }

    public function fumigacion()
    {
        return $this->hasOne(Fumigacion::class);
    }
    
}
