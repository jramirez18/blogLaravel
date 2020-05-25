<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //primero hacemos un truncate, y luego generamos los datos
        //y despues corremos los seeders
        $this->truncateTables([
            'users',
            'posts',
            'comments'
        ]);
        $this->call(UsersTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }

    //para no estar comentando a cada ratos los seeder creamos esta funcion
    public function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        foreach ($tables as $table) {
            DB::table($table)->truncate();
            
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
