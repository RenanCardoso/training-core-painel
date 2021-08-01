<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Models\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $this->faker->city
    ];
});
