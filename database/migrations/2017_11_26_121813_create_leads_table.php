<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use abenevaut\Infrastructure\Interfaces\Domain\Users\Users\UserCivilitiesInterface;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('leads', function (Blueprint $table) {
			$table->increments('id');
			$table->enum('civility', [
				UserCivilitiesInterface::CIVILITY_MADAM,
				UserCivilitiesInterface::CIVILITY_MISS,
				UserCivilitiesInterface::CIVILITY_MISTER,
			])->default(UserCivilitiesInterface::CIVILITY_MADAM)->index();
			$table->string('first_name', 100);
			$table->string('last_name', 100);
			$table->string('email', 80)->unique()->index();
			$table->timestampsTz();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('leads');
    }
}
