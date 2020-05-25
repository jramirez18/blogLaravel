<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;//ACA TENEMOS IMPORTADO EL FACADE

use App\Policies\PostPolicy;
use App\Models\Post;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Post::class=>PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->deleteAction();

        //
    }

    public function deleteAction()
    {
        //Llamamos al GATE, como primer parametro le pasamos el nombre del gate
        //como 2do argumento recibe un function, q recibe de parametro primero que nada al user que se pasa automaticamente
        // y el sig representa el recurso a evaluar el cual es POST
        Gate::define('delete-post',function($user,$post){
            //EVALUAMOS SI EL USER->ID ES IGUAL AL POST ID
            //aca verificamos que la persona que esta eliminando el post es el MISMO propietario
            return $user->id==$post->id;


        });//ahora lo registramos en el metodo BOOT
        //LUEGO NOS VAMOS AL CONTROLADOR E IMPORTAMOS EL FACADE GATE
        //Y NOS VAMOS A LA ACCION DESTROY Y AL INICIO DEL METODO LLAMAMOS A LA ACCION GATE
    }
}
