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
        //$this->call(UsersTableSeeder::class);
       factory(App\User::class, 50)->create();
        factory(App\house::class, 150)->create();


        factory(App\location::class, 100)->create();
        factory(App\profile::class, 51)->create();

       factory(App\city::class,20)->create();

    }
}
