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
	->define(abenevaut\Domain\Users\Users\User::class, function (Faker\Generator $faker) {
		static $password;

		return [
			'uniqid' => uniqid(),
			'locale' => $faker->randomElement(\abenevaut\Domain\Users\Users\User::LOCALES),
			'timezone' => $faker->randomElement(timezones()),
			'role' => $faker->randomElement([
				\abenevaut\Domain\Users\Users\User::ROLE_ADMINISTRATOR,
				\abenevaut\Domain\Users\Users\User::ROLE_CUSTOMER,
			]),
			'civility' => $faker->randomElement([
				\abenevaut\Domain\Users\Users\User::CIVILITY_MADAM,
				\abenevaut\Domain\Users\Users\User::CIVILITY_MISS,
				\abenevaut\Domain\Users\Users\User::CIVILITY_MISTER,
			]),
			'first_name' => $faker->firstName,
			'last_name' => $faker->lastName,
			'email' => $faker->unique()->safeEmail,
			'password' => $password ?: $password = bcrypt('secret'),
			'remember_token' => str_random(10),
		];
	})
	->state(abenevaut\Domain\Users\Users\User::class, \abenevaut\Domain\Users\Users\User::ROLE_ADMINISTRATOR, [
		'role' => \abenevaut\Domain\Users\Users\User::ROLE_ADMINISTRATOR,
	])
	->state(abenevaut\Domain\Users\Users\User::class, \abenevaut\Domain\Users\Users\User::ROLE_CUSTOMER, [
		'role' => \abenevaut\Domain\Users\Users\User::ROLE_CUSTOMER,
	])
	->state(abenevaut\Domain\Users\Users\User::class, \abenevaut\Domain\Users\Users\User::DEFAULT_LOCALE, [
		'locale' => \abenevaut\Domain\Users\Users\User::DEFAULT_LOCALE,
	])
	->state(abenevaut\Domain\Users\Users\User::class, \abenevaut\Domain\Users\Users\User::DEFAULT_TZ, [
		'timezone' => \abenevaut\Domain\Users\Users\User::DEFAULT_TZ,
	]);
