<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre'
    ];

    // Relación: un género tiene muchos álbumes
    public function albumes()
    {
        return $this->hasMany(Album::class);
    }
}

