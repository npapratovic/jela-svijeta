<?php

$factory->define(App\Meal::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "slug" => $faker->name,
        "description" => $faker->name,
        "category_id" => factory('App\Category')->create(),
        "language_id" => factory('App\Language')->create(),
    ];
});
