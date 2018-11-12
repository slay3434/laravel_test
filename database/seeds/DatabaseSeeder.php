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
          factory(App\User::class, 5)->create();
         //$this->call(UsersTableSeeder::class);
        //$this->call(LinksTableSeeder::class);
         $this->call(ColorsTableSeeder::class);
      
    }
}
