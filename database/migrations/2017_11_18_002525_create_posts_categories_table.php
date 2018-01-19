<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('posts_categories', function (Blueprint $table) {
			$table->increments('id');
			$table->string('uniqid', 13)->unique()->index();
			$table->string('title', 100);
			$table->string('slug', 100)->unique()->index();
			$table->string('image_path');
			$table->timestampsTz();
			$table->softDeletesTz();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('posts_categories');
    }
}
