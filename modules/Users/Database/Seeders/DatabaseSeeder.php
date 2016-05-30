<?php namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$this->call('Modules\Users\Database\Seeders\CountryTableSeeder');
		$this->call('Modules\Users\Database\Seeders\StateTableSeeder');
	}

}