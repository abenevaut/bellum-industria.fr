<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTables extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('countries', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 60);
			$table->string('slug', 60);
			$table->string('iso_3166_2', 2);
			$table->string('iso_3166_alpha_2', 2);
			$table->string('iso_3166_alpha_3', 3);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('countries');
	}

}
