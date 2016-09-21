<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('projects', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('reference');
			$table->text('description');
			$table->boolean('is_public');
			$table->date('stating_date');
			$table->date('ending_date');
			$table->date('production_start_date');
			$table->timestamps();
			$table->index('reference');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
    }
}
