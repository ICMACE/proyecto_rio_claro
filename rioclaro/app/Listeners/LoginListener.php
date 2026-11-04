<?php

namespace App\Listeners;

use App\Services\AuditService;
use Illuminate\Auth\Events\Login;

class LoginListener
{
    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        AuditService::registrar(

            modulo: 'Auth',

            accion: 'LOGIN',

            detalle: [

                'usuario_id' =>
                    $event->user->id,

                'nombre' =>
                    $event->user->name,

                'correo' =>
                    $event->user->email
            ]
        );
    }
}