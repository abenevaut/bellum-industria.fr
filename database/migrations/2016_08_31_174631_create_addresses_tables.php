<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTables extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('addresses', function (Blueprint $table)
		{
			$table->increments('id');
			$table->enum('flag', Config::get('addresses.flags'));
			$table->morphs('model');
			$table->string('street', 50);
			$table->string('street_extra', 50)
				->nullable();
			$table->string('city', 50);
			$table->string('zip', 11);

			$table->integer('state_id')
				->unsigned()
				->index()
				->foreign('state_id')
				->references('id')
				->on('states')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->float('latitude')
				->nullable();
			$table->float('longitude')
				->nullable();
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('addresses');
	}

}
