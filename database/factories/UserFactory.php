<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [

        "document"=> '111122223',
        "name"=> $faker->name,
        "last_name"=> $faker->lastName,
        "email"=> $faker->email,
        "user_name"=> $faker->lastName,
        "phone"=> '318564382',
        "gender_id"=> 1,
        "slug"=>$faker->lastName,
        "password"=> bcrypt('secret'),
        "picture"=> '/assets/images/default.png',
        "company_id"=> 2,

    ];
});
