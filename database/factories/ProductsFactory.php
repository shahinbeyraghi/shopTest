<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->text(32),
        'description' => $faker->title,
        'status' => 1
    ];
});
