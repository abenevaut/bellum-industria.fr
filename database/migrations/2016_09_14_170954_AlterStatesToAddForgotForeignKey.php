<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterStatesToAddForgotForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('states', function ($table)
		{
			$table->foreign('country_id')
				->references('id')
				->on('countries')
				->onUpdate('cascade')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('states', function ($table)
		{
			$table->dropForeign('states_country_id_foreign');
		});
    }
}
