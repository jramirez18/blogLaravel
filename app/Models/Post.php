<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'user_id',
    ];


    //FUNCIONES DE RELACIONES ENTRE TABLAS
    public function user()
    {
        //busca por usuario, dentro de la tabla Post va buscar un campo llamado user_id
        //muestra toda la info del user que creo dicho post
        return $this->belongsTo('App\User');

    }

    //1 post puede tener muchos comentarios lo llamamos en PLURAL
    public function comments()
    {
        //ESTE METODO BUSCA EN LA TABLA COMMENTS EL CAMPO POST_ID
        $this->hasMany('App\Models\Comment');
    }

    public function userHasRoles()
    {
        return $this->belongsToMany('App\Role');
    }


}
