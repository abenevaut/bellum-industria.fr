<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use template\Domain\Files\Medias\Media;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory
    ->define(Media::class, function (Faker\Generator $faker) {
        return [
            'model_type' => null,
            'model_id' => null,
            'collection_name' => $faker->text,
            'name' => $faker->text,
            'file_name' => null,
            'mime_type' => null,
            'disk' => $faker->text,
            'size',
            'manipulations',
            'custom_properties',
            'order_column',
        ];
    });
