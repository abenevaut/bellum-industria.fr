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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory
	->define(bellumindustria\Domain\Users\Leads\Lead::class, function (Faker\Generator $faker) {
		return [
			'user_id' => 0,
			'civility' => $faker->randomElement([
				\bellumindustria\Domain\Users\Users\User::CIVILITY_MADAM,
				\bellumindustria\Domain\Users\Users\User::CIVILITY_MISS,
				\bellumindustria\Domain\Users\Users\User::CIVILITY_MISTER,
			]),
			'first_name' => $faker->firstName,
			'last_name' => $faker->lastName,
			'email' => $faker->unique()->safeEmail,
		];
	});
