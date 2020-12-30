<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sale;
use App\User;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
    return [
        'user_id'=>User::inRandomOrder()->first()->id,
        'value'=>$faker->randomFloat(2,10,5000),
        'on_date'=>$faker->dateTimeBetween('-30 days','now')
    ];
});
