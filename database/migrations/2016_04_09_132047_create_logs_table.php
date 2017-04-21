<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateLogsTable
 */
class CreateLogsTable extends Migration
{

	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('logs', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('domain_id');
			$table->integer('user_id');
			$table->integer('content_id');
			$table->string('content_type');
			$table->string('action');
			$table->string('description');
			$table->text('details');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::drop('logs');
	}
}
