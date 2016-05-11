<?php namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Users\Entities\User;
use Core\Domain\Roles\Entities\Role;
use Core\Domain\Users\Entities\ApiKey;

use Faker\Factory as Faker;
use Modules\Users\Repositories\RoleRepositoryEloquent;

class UserTableSeeder extends Seeder {

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
		 * Admin
		 */

		$user = User::create([
			'last_name' => 'Antoine',
			'first_name' => 'Benevaut',
			'email' => 'antoine@cvepdb.fr',
			'password' => bcrypt('secret'),
		]);

		$role = Role::where('name', RoleRepositoryEloquent::USER)->first();
		$user->attachRole($role->id);

		$role = Role::where('name', RoleRepositoryEloquent::ADMIN)->first();
		$user->attachRole($role->id);

		$m_apikey->create([
			'user_id' => $user->id,
			'key' => 'e2963477db70035b6c6609cea38c56e63c0b0520',
			'level' => 10,
			'ignore_limits' => 0,
		]);

		/*
		 * Users
		 */

		foreach (range(1,20) as $index) {
			$user = User::create([
				'last_name' => $faker->lastName,
				'first_name' => $faker->firstName,
				'email' => $faker->email,
				'password' => bcrypt('secret'),
			]);

			$role = Role::where('name', 'user')->first();
			$user->attachRole($role->id);

			$m_apikey->create([
				'user_id' => $user->id,
				'key' => $m_apikey->generateKey(),
				'level' => 10,
				'ignore_limits' => 0,
			]);
		}
		Model::reguard();
	}

}