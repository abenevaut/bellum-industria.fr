<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSocialTokensTable
 */
class CreateSocialTokensTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('social_tokens', function (Blueprint $table)
		{
			$table->string('provider');
			$table->string('token')->index();
			$table->integer('user_id')->unsigned()->index();
			$table->timestamps();

			$table
				->foreign('user_id')
				->references('id')
				->on('users')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->primary([
				'user_id',
				'token'
			]);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('social_tokens');
	}
}
