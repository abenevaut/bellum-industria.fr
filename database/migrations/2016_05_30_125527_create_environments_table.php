<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvironmentsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('environments', function (Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('name')->index();
			$table->string('reference')->index();
			$table->string('domain')->index();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('environments');
	}
}
