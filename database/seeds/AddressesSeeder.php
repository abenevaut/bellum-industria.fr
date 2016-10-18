<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AddressesSeeder
 */
class AddressesSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		$this->call('CountriesSeeder');
		$this->call('StatesSeeder');
		$this->call('SubStatesSeeder');
		Model::reguard();
	}

}
