<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTables extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('states', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('country_id')
				->unsigned()
				->index()
				->foreign('country_id')
				->references('id')
				->on('countries')
				->onUpdate('cascade')
				->onDelete('cascade');
			$table->string('name', 60);
			$table->string('slug', 60);
			$table->string('regions_label', 60);
			$table->string('iso_3166_alpha_2', 3)
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
		Schema::drop('states');
	}

}
