<?php

use Illuminate\Database\Migrations\Migration;

class CreateAddresses extends Migration {

	public function up() {

		Schema::create('addresses', function($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->string('organization', 50)->nullable();
			$table->string('street', 50);
			$table->string('street_extra', 50)->nullable();
			$table->string('city', 50);
			$table->string('state_a2', 2);
			$table->string('state_name', 60);
			$table->string('zip', 11);
			$table->string('country_a2', 2)->default(\Config::get('users::default_country'));
			$table->string('country_name', 60)->default(\Config::get('users::default_country_name'));

			foreach(['primary', 'billing', 'shipping'] as $flag) {
				$table->boolean('is_'.$flag)->default(false)->index();
			}

			$table->float('latitude')->nullable();
			$table->float('longitude')->nullable();
		});

	}

	public function down() {
		Schema::drop('addresses');
	}

}