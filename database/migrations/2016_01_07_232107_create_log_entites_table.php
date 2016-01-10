<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogEntitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_entites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('contentId');
            $table->string('contentType');
            $table->string('action');
            $table->string('description');
            $table->text('details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('log_entites');
    }
}
