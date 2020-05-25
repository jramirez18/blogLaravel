<?php

use Illuminate\Database\Seeder;

#importamos la clase usuarios
use \App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Aca definimos la creacions del user
        //User::create(["name"=>"Jorge","email"=>"j@email.com","password"=>"12345"]);
        //User::create(["name"=>"Luis","email"=>"l@email.com","password"=>"12345"]);
        factory(User::class)->times(40)->create();


    }
}
