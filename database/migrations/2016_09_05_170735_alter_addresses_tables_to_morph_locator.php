<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddressesTablesToMorphLocator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

		Schema::table('addresses', function (Blueprint $table)
		{

			$table->morphs('locator');
			$table->dropColumn('state_id');

		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('addresses', function ($table)
		{

			$table->dropColumn('locator_id');
			$table->dropColumn('locator_type');

			$table->integer('state_id')
				->after('zip')
				->unsigned()
				->nullable()
				->index()
				->foreign('state_id')
				->references('id')
				->on('states')
				->onUpdate('cascade')
				->onDelete('cascade');

		});
    }
}
