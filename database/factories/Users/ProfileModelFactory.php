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
	->define(abenevaut\Domain\Users\Profiles\Profile::class, function (Faker\Generator $faker) {
		return [
			'user_id' => 0,
			'birth_date' => $faker->dateTimeThisDecade()->format('Y-m-d H:i:s'),
			'family_situation' => ($family_situation = $faker->randomElement([
				\abenevaut\Domain\Users\Profiles\Profile::FAMILY_SITUATION_SINGLE,
				\abenevaut\Domain\Users\Profiles\Profile::FAMILY_SITUATION_MARRIED,
				\abenevaut\Domain\Users\Profiles\Profile::FAMILY_SITUATION_CONCUBINAGE,
				\abenevaut\Domain\Users\Profiles\Profile::FAMILY_SITUATION_DIVORCEE,
				\abenevaut\Domain\Users\Profiles\Profile::FAMILY_SITUATION_WIDOW_ER,
			])),
			'maiden_name' => $faker->text(100),
			'is_sidebar_pined' => $faker->boolean,
		];
	});
