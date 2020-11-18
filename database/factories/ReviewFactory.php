<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'product_id' => function () {
            return Product::all()->random();
        },
        'customer' => $faker->name(),
        'review' => $faker->paragraph(3),
        'star' => $faker->numberBetween(0, 5)
    ];
});
