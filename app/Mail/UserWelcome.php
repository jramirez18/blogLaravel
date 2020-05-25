<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserWelcome extends Mailable
{
    use Queueable, SerializesModels;

    //DEFINIMOS UNA PROPIEDAD PUBLICA QUE SE LLAMA USER, el cual va representar al usuario
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     //AQUI LE PASAMOS UN USUARIO
    public function __construct($user)
    {
        //$this->user es igual al usuario que le pasamos como argumento
        $this->user=$user;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.welcome')
            ->with([
                //recibe un arreglo el cual vamos a enviar muchos parametros
                'user'=>$this->user
            ]);
    }
}
