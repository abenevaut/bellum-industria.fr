<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		Model::unguard();
		$this->call('Modules\Users\Database\Seeders\CountryTableSeeder');
		$this->call('Modules\Users\Database\Seeders\StateTableSeeder');
		$this->call('Modules\Users\Database\Seeders\RoleAndPermissionTablesSeeder');
		Model::reguard();
	}
}
