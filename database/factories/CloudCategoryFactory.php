<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CloudCategory;
use Faker\Generator as Faker;

$factory->define(CloudCategory::class, function (Faker $faker) {
    return [
        'id'=>null,
        'name'=>$faker->jobTitle,
        'description'=>$faker->sentence
    ];
});
