<?php namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Users\Entities\Role;
use Modules\Users\Repositories\RoleRepositoryEloquent;
use Core\Domain\Environments\Entities\Environment;
use Core\Domain\Environments\Repositories\EnvironmentRepositoryEloquent;

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

		Model::reguard();
	}
}
