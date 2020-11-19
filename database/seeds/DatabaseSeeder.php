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

        factory(\App\Gender::class, 1)->create(['name' => 'Masculino']);
        factory(\App\Gender::class, 1)->create(['name' => 'Femenino']);
        factory(\App\Gender::class, 1)->create(['name' => 'No decir']);
        $this->call(UsersTableSeeder::class);
    }
}
