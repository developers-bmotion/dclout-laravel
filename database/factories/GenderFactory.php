<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gender;
use Faker\Generator as Faker;

$factory->define(Gender::class, function (Faker $faker) {
    return [
        'id'=>null,
        'name'=>$faker->jobTitle,
        'description'=>$faker->sentence
    ];
});
