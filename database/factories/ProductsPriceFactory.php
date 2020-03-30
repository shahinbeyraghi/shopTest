<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductsPrice;
use Faker\Generator as Faker;

$factory->define(ProductsPrice::class, function (Faker $faker) {
    $colors = ['black', 'red', 'blue', 'yellow'];
    return [
        'price' => rand(1000, 15000),
        'color' => $colors[rand(0,3)],
        'status' => 1
    ];
});
