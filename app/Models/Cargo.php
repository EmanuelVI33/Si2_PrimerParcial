<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'salario_min',
        'salario_max',
    ];

    public function contrato()
    {
        
    }
}
