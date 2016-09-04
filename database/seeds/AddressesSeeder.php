<?php

use Illuminate\Database\Seeder;

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
		$this->call('CountriesSeeder');
		$this->call('StatesSeeder');
		$this->call('SubStatesSeeder');
	}

}
