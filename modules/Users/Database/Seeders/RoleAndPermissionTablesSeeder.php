<?php namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Users\Entities\Role;

class RoleAndPermissionTablesSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		Role::create([
			'name' => RoleRepositoryEloquent::USER,
			'display_name' => 'roles.' . RoleRepositoryEloquent::USER . ':display_name',
			'description' => 'roles.' . RoleRepositoryEloquent::USER . ':description',
			'unchangeable' => true
		]);

		Role::create([
			'name' => RoleRepositoryEloquent::ADMIN,
			'display_name' => 'roles.' . RoleRepositoryEloquent::ADMIN . ':display_name',
			'description' => 'roles.' . RoleRepositoryEloquent::ADMIN . ':description',
			'unchangeable' => true
		]);

		Model::reguard();
	}

}