<?php namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Users\Entities\User;
use CVEPDB\Repositories\Roles\Role;
use Modules\Users\Entities\ApiKey;

use Faker\Factory as Faker;

class UsersDatabaseSeeder extends Seeder {

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

		// $this->call("OthersTableSeeder");

		Model::reguard();
	}

}