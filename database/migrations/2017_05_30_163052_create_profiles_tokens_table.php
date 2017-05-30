<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('profiles_tokens', function (Blueprint $table) {
			$table->integer('profile_id')->unsigned()->index();
			$table->string('provider');
			$table->string('consumer_key');
			$table->string('consumer_secret');
			$table->timestamps();

			$table
				->foreign('profile_id')
				->references('id')
				->on('profiles')
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
		Schema::dropIfExists('profiles_tokens');
    }
}
