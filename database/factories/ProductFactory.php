<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return User::all()->random();
        },
        'name' => $faker->word,
        'detail' => $faker->paragraph(3),
        'price' => $faker->numberBetween(100, 1000),
        'stock' =>  $faker->randomDigit,
        'discount' => $faker->numberBetween(2, 30)
    ];
});
