<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimientoInventario extends Model
{
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
