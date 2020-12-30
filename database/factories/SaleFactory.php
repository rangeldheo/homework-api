<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sale;
use App\Models\Salesman;
use App\User;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
    return [
        'salesmen_id'=>Salesman::inRandomOrder()->first()->id,
        'value'=>$faker->randomFloat(2,10,5000),
        'on_date'=>$faker->dateTimeBetween('-30 days','now')
    ];
});
