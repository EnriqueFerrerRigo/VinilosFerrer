<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PedidosAlbum;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'fecha',
        'total',
        'estado',  // Si añadiste este campo en la migración
    ];

    // Relación: un pedido pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Relación: un pedido tiene muchos álbumes (detalle)
    public function pedidosAlbum()
    {
        return $this->hasMany(PedidosAlbum::class, 'pedido_id');
    }
}
