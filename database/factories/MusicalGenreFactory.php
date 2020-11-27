<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MusicalGenre;
use Faker\Generator as Faker;

$factory->define(MusicalGenre::class, function (Faker $faker) {
    return [
        'id'=>null,
        'name'=>$faker->jobTitle,
        'description'=>$faker->sentence
    ];
});
