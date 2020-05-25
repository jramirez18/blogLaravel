<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
Use App\User;
Use App\Post;
use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    $count=User::count();
    return [
        //
        "content"=>$faker->text($maxNbChars=150),
        "user_id"=>$faker->numberBetween(1,$count),
        "post_id"=>$faker->numberBetween(1,$count)
    ];
});
