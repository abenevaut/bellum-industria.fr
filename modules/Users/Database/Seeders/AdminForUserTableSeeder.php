<?php namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Users\Entities\User;
use Core\Domain\Roles\Entities\Role;
use Core\Domain\Users\Entities\ApiKey;
use Core\Domain\Environments\Entities\Environment;
use Faker\Factory as Faker;
use Modules\Users\Repositories\RoleRepositoryEloquent;

/**
 * Class AdminForUserTableSeeder
 * @package Modules\Users\Database\Seeders
 */
class AdminForUserTableSeeder extends Seeder
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
		 * Admin
		 */

		$user = User::create([
			'last_name'  => 'Antoine',
			'first_name' => 'Benevaut',
			'email'      => 'antoine@cvepdb.fr',
			'password'   => bcrypt('secret'),
		]);

		$user->environments()->detach();

		$envs = Environment::all();
		foreach ($envs as $env)
		{
			$user->environments()->attach($env->id);
		}

		$role = Role::where('name', RoleRepositoryEloquent::USER)->first();
		$user->attachRole($role->id);

		$role = Role::where('name', RoleRepositoryEloquent::ADMIN)->first();
		$user->attachRole($role->id);

		$m_apikey->create([
			'user_id'       => $user->id,
			'key'           => 'e2963477db70035b6c6609cea38c56e63c0b0520',
			'level'         => 10,
			'ignore_limits' => 0,
		]);

		Model::reguard();
	}

}
