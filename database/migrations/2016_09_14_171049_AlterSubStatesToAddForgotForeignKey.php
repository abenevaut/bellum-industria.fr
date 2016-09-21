<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSubStatesToAddForgotForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('substates', function ($table)
		{
			$table->foreign('state_id')
				->references('id')
				->on('states')
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
		Schema::table('substates', function ($table)
		{
			$table->dropForeign('substates_state_id_foreign');
		});
    }
}
