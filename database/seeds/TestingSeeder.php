<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TestingSeeder
 */
class TestingSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		Model::unguard();
		$this->call('Modules\Users\Database\Seeders\CountryTableSeeder');
		$this->call('Modules\Users\Database\Seeders\StateTableSeeder');

		/*
		 * xABE Todo : Add default environment
		 */

		$this->call('Modules\Users\Database\Seeders\RoleAndPermissionTablesSeeder');
		$this->call('Modules\Users\Database\Seeders\AdminForUserTableSeeder');
		$this->call('Modules\Users\Database\Seeders\UserTableSeeder');
		Model::reguard();
	}
}
