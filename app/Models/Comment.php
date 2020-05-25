<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable=[
        'content','user_id','post_id',

    ];


    //COMENTARIO solo puede pertenecer a un POST
    public function post()
    {
        $this->belongsTo('App\Models\Post');
        
    }

    public function user()
    {
        $this->belongsTo('App\User');
        
    }
}
