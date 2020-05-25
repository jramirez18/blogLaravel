<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

//importamos el facade de mail
use Illuminate\Support\Facades\Mail;
//tambien el mail de la carpeta MAIL
use App\Mail\UserWelcome;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        //
        //agregamos esto
        $user=$event->user;
        //termina
        Mail::to($user->email)->send(new UserWelcome($user)); //ESTA ESTABA ANTES EN EL REGISTERcontroller

    }
}
