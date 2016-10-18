<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubstatesTables extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('substates', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('state_id')
				->unsigned()
				->index()
				->foreign('state_id')
				->references('id')
				->on('states')
				->onUpdate('cascade')
				->onDelete('cascade');
			$table->string('name', 60);
			$table->string('slug', 60);
			$table->string('subregions_label', 60);
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
		Schema::drop('substates');
	}

}
