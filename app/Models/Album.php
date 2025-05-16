<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albumes';  // Se indica el nombre de la tabla para que no dé error

    protected $fillable = [
        'titulo',
        'artista_id',
        'genero_id',
        'anio',
        'imagen',
        'precio',
        'stock',
    ];

    public function artista()
    {
        return $this->belongsTo(Artista::class);
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }
}
