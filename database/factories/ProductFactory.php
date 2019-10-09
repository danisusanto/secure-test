<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductModel;
use Faker\Generator as Faker;

$factory->define(ProductModel::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title' =>  $faker->catchPhrase,
        'author' => $faker->name,
        'image' => $faker->imageUrl(350, 350),
        'description' => $faker->realText(200, 2)
    ];
});
