<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'facturas';
    protected $fillable = [

        'folio',

        'proveedor_id',

        'fecha_factura',

        'subtotal',

        'iva',

        'total',

        'archivo',

        'estado'
    ];

    public function proveedor()
    {
        return $this->belongsTo(
            Proveedor::class
        );
    }
}
