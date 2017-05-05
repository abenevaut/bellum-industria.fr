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
        $this->call('DomainsTableSeeder');
		$this->call('cms\Modules\Users\Database\Seeders\TestingSeeder');
		Model::reguard();
	}
}
