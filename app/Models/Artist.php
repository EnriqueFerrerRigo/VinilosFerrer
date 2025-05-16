<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    use HasFactory;

    protected $table = 'artistas'; // explícito porque el nombre no es plural en inglés

    protected $fillable = [
        'nombre',
        'bio',
        'imagen',
    ];
}
