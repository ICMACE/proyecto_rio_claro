<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $fillable = [
        'codigo',
        'nombre',
        'rfc',
        'telefono',
        'correo',
        'contacto'
    ];
    public function productos()
    {
        return $this->hasMany(
            Producto::class
        );
    }
}
