<?php

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "slug" => $faker->name,
        "language_id" => factory('App\Language')->create(),
    ];
});
