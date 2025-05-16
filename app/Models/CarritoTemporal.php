<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarritoTemporal extends Model
{
    use HasFactory;

    protected $table = 'carrito_temporal'; 

    protected $fillable = ['usuario_id', 'album_id', 'cantidad'];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
