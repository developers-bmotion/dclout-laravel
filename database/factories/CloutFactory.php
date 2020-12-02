<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Clout;
use Faker\Generator as Faker;

$factory->define(Clout::class, function (Faker $faker) {
    $user= factory(\App\User::class, 1)->create();
    return [

            'id'=>null,
            'user_id'=>$user[0]->id,
            'level_id'=>1,
            'clout_category_id'=>\App\CloudCategory::all()->random()->id


    ];
});
