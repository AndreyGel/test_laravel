<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'image_url' => $faker->url,
        'product_name' => $faker->word,
        'categories' => $faker->text,
        'id' => (string)rand(1, 9000000000000)
    ];
});
