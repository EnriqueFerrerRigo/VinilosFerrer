<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'album_id',
    ];

    // Relación: un favorito pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Relación: un favorito pertenece a un álbum
    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
