<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        //ruta hacia mi evento
        //clase q representa a nuestro evento
        'App\Events\UserRegistered'=> [
            //defino todos mis litenersss
            //y cuando llamemos a nuestra clase se van a ejecutar cada uno los LISTENERS q hayamos definido dentro del arreglo
            'App\Listeners\SendWelcomeEmail',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
