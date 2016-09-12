<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTeamsTableAddLinkToCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('teams', function (Blueprint $table)
		{
			$table->integer('country_id')
				->unsigned()
				->default(76) // france
				->after('reference');
			$table->index('country_id');
			$table->engine = 'InnoDB';
			$table->foreign('country_id')
				->references('id')
				->on('countries');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('teams', function ($table)
		{
			$table->dropColumn('country_id');
		});
    }
}
