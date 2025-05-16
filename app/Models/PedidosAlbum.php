<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosAlbum extends Model
{
    use HasFactory;

    protected $table = 'pedidos_album'; // nombre explícito de tabla

    protected $fillable = [
        'pedido_id',
        'album_id',
        'cantidad',
        'precio_unitario',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
