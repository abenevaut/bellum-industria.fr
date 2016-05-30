<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        Model::reguard();
    }
=======
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
>>>>>>> e3011fbb5aedfa377b00e2740ac2dca3d5e31406
}
