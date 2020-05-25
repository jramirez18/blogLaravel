<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
Use App\User;
use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    $count=User::count();//devuelve la cant de registros que hay en la tabla users
    return [
        "title"=>$faker->name,
        "content"=>$faker->text($maxNbChars=50),
        "user_id"=>$faker->numberBetween(1,$count)


    ];
});
