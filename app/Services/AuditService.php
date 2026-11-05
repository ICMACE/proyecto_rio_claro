<?php

namespace App\Services;

use App\Models\LogAuditoria;

class AuditService
{
    public static function registrar(
        string $modulo,
        string $accion,
        array $detalle = [],
        ?string $entidad = null,
        ?int $entidadId = null
    ): void {

        LogAuditoria::create([

            'user_id' =>
                auth()->id(),

            'modulo' =>
                $modulo,

            'accion' =>
                $accion,

            'entidad' =>
                $entidad,

            'entidad_id' =>
                $entidadId,

            'detalle' =>
                $detalle,

            'ip' =>
                request()->ip(),

            'url' =>
                request()->fullUrl(),

            'metodo_http' =>
                request()->method(),

            'user_agent' =>
                substr(
                    request()->userAgent() ?? '',
                    0,
                    255
                )
        ]);
    }
}