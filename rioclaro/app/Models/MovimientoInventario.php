<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimientoInventario extends Model
{
    protected $table = 'movimientos_inventario';
    protected $fillable = [
        'producto_id',
        'user_id',
        'tipo',
        'cantidad',
        'observaciones'
    ];

    public function producto()
{
    return $this->belongsTo(
        Producto::class
    );
}

public function usuario()
{
    return $this->belongsTo(
        User::class
    );
}
}
