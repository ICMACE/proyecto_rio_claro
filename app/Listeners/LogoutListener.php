<?php

namespace App\Listeners;

use App\Services\AuditService;
use Illuminate\Auth\Events\Logout;

class LogoutListener
{
    /**
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
        AuditService::registrar(

            modulo: 'Auth',

            accion: 'LOGOUT',

            detalle: [

                'usuario_id' =>
                    $event->user?->id,

                'nombre' =>
                    $event->user?->name,

                'correo' =>
                    $event->user?->email,
            ]
        );
    }
}