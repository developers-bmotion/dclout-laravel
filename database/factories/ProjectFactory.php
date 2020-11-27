<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    $user= factory(\App\User::class, 1)->create();
    return [

            'id'=>null,
           'name'=>'',
           'description'=>$faker->text,
            'link'=>'www.prueba.com',
            'state'=> \App\Project::ACEPTADO,
            'end_time'=>'2020-09-09',
            'user_id'=>$user[0]->id,
            'project_category_id'=>\App\ProjectCategory::all()->random()->id
        ];
});
