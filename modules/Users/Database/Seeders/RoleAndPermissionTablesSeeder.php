<?php namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Core\Domain\Roles\Entities\Role;
use Core\Domain\Roles\Entities\Permission;
use Core\Domain\Roles\Repositories\PermissionRepositoryEloquent;
use Core\Domain\Environments\Entities\Environment;
use Core\Domain\Environments\Repositories\EnvironmentRepositoryEloquent;
use Modules\Users\Repositories\RoleRepositoryEloquent;

/**
 * Class RoleAndPermissionTablesSeeder
 * @package Modules\Users\Database\Seeders
 */
class RoleAndPermissionTablesSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$env = Environment::where(
			[
				'reference' => EnvironmentRepositoryEloquent::DEFAULT_ENVIRONMENT_REFERENCE
			]
		)
			->firstOrFail();

		/*
		 * Roles
		 */

		$role = Role::create([
			'name'         => RoleRepositoryEloquent::USER,
			'display_name' => 'roles.' . RoleRepositoryEloquent::USER . ':display_name',
			'description'  => 'roles.' . RoleRepositoryEloquent::USER . ':description',
			'unchangeable' => true
		]);

		$role->environments()->detach();
		$role->environments()->attach($env->id);

		$role = Role::create([
			'name'         => RoleRepositoryEloquent::ADMIN,
			'display_name' => 'roles.' . RoleRepositoryEloquent::ADMIN . ':display_name',
			'description'  => 'roles.' . RoleRepositoryEloquent::ADMIN . ':description',
			'unchangeable' => true
		]);

		$role->environments()->detach();
		$role->environments()->attach($env->id);

		/*
		 * Permissions
		 */

		$permission = Permission::create([
			'name'         => PermissionRepositoryEloquent::ACCESS_ADMIN_PANEL,
			'display_name' => 'permissions.' . PermissionRepositoryEloquent::ACCESS_ADMIN_PANEL . ':display_name',
			'description'  => 'permissions.' . PermissionRepositoryEloquent::ACCESS_ADMIN_PANEL . ':description'
		]);

//		$permission->environments()->detach();
//		$permission->environments()->attach($env->id);

		$permission = Permission::create([
			'name'         => PermissionRepositoryEloquent::SEE_ENVIRONMENT,
			'display_name' => 'permissions.' . PermissionRepositoryEloquent::SEE_ENVIRONMENT . ':display_name',
			'description'  => 'permissions.' . PermissionRepositoryEloquent::SEE_ENVIRONMENT . ':description'
		]);

//		$permission->environments()->detach();
//		$permission->environments()->attach($env->id);

		$permission = Permission::create([
			'name'         => PermissionRepositoryEloquent::MANAGE_ENVIRONMENT,
			'display_name' => 'permissions.' . PermissionRepositoryEloquent::MANAGE_ENVIRONMENT . ':display_name',
			'description'  => 'permissions.' . PermissionRepositoryEloquent::MANAGE_ENVIRONMENT . ':description'
		]);

//		$permission->environments()->detach();
//		$permission->environments()->attach($env->id);

		$permission = Permission::create([
			'name'         => PermissionRepositoryEloquent::MANAGE_ENVIRONMENT_ITEMS,
			'display_name' => 'permissions.' . PermissionRepositoryEloquent::MANAGE_ENVIRONMENT_ITEMS . ':display_name',
			'description'  => 'permissions.' . PermissionRepositoryEloquent::MANAGE_ENVIRONMENT_ITEMS . ':description'
		]);

//		$permission->environments()->detach();
//		$permission->environments()->attach($env->id);

		Model::reguard();
	}
}
