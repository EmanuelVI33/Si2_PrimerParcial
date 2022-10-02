<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'ci',
        'telefono',
        'image',
        'user_id',
    ];

    public function users() {
        return $this->hasOne(User::class);
    }
    
}
