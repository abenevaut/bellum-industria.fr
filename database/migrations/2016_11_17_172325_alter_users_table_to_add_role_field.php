<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use cms\Domain\Users\Users\User;

class AlterUsersTableToAddRoleField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('users', function ($table) {
			$table->enum(
				'role',
				[
					User::ROLE_USER,
					User::ROLE_MODERATOR,
					User::ROLE_ADMIN,
					User::ROLE_SUPERADMIN
				]
			)
				->after('birth_date');
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
			$table->dropColumn('role');
		});
    }
}
