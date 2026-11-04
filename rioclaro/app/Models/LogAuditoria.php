<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAuditoria extends Model
{
    protected $table = 'logs_auditoria';

    protected $fillable = [

        'user_id',

        'modulo',

        'accion',

        'entidad',

        'entidad_id',

        'detalle',

        'ip',

        'url',

        'metodo_http',

        'user_agent'
    ];

    protected $casts = [

        'detalle' => 'array'
    ];
    public function usuario()
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }
}