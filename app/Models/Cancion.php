<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    use HasFactory;

        
    protected $table = 'canciones';

    protected $fillable = [
        'album_id',
        'titulo',
        'duracion',
    ];


    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
