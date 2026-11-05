<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = [
        'codigo',
        'nombre',
        'categoria',
        'unidad',
        'stock_actual',
        'stock_minimo',
        'stock_maximo',
        'proveedor_id'
    ];

    public function proveedor()
    {
        return $this->belongsTo(
            Proveedor::class
        );
    }
    public function movimientos()
{
    return $this->hasMany(
        MovimientoInventario::class
    );
}
}
