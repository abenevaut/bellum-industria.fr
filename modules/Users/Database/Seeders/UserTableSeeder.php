<?php namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Users\Entities\User;
use Core\Domain\Roles\Entities\Role;
use Core\Domain\Users\Entities\ApiKey;
use Core\Domain\Environments\Entities\Environment;
use Core\Domain\Environments\Repositories\EnvironmentRepositoryEloquent;
use Faker\Factory as Faker;

/**
 * Class UserTableSeeder
 * @package Modules\Users\Database\Seeders
 */
class UserTableSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$faker = Faker::create();
		$m_apikey = new ApiKey;

		/*
		 * Users
		 */

		$env = Environment::where(
			[
				'reference' => EnvironmentRepositoryEloquent::DEFAULT_ENVIRONMENT_REFERENCE
			]
		)
			->firstOrFail();

		foreach (range(1, 100000) as $index)
		{
			$user = User::create([
				'last_name'  => $faker->lastName,
				'first_name' => $faker->firstName,
				'email'      => $faker->email,
				'password'   => bcrypt('secret'),
			]);

			$user->environments()->detach();
			$user->environments()->attach($env->id);

			$role = Role::where('name', 'user')->first();
			$user->attachRole($role->id);

			$m_apikey->create([
				'user_id'       => $user->id,
				'key'           => $m_apikey->generateKey(),
				'level'         => 10,
				'ignore_limits' => 0,
			]);
		}
		Model::reguard();
	}

}
