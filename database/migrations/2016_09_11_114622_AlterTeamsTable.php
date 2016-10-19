<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTeamsTable extends Migration
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
			$table->string('tag')
				->after('name');

			$table->string('website_url')
				->after('tag');

			$table->boolean('is_cvepdb_team')
				->after('reference');

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

			$table->dropColumn('tag');
			$table->dropColumn('website_url');
			$table->dropColumn('is_cvepdb_team');

		});
    }
}
