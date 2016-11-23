<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTableToAddCivilityAndBirthdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('users', function ($table) {
			$table->enum('civility', ['madam', 'miss', 'mister'])
				->after('id');
			$table->date('birth_date')
				->nullable()
				->after('email');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function ($table) {
			$table->dropColumn('civility');
			$table->dropColumn('birth_date');
		});
    }
}
