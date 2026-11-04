<?php

namespace App\Providers;

use App\Listeners\LoginListener;
use App\Listeners\LogoutListener;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [

        Login::class => [
            LoginListener::class,
        ],

        Logout::class => [
            LogoutListener::class,
        ],
    ];
}