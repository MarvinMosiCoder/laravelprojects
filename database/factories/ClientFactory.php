<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'fname' => $faker->text(50),
        'mname' => $faker->text(50),
        'lname' => $faker->text(50),
        'fname' => $faker->text(50),
        'gender' => $faker->text(50),
        'email' => $faker->text(50),
        'contact' => $faker->text(50),
        'address' => $faker->text(50)
        
    ];
});
