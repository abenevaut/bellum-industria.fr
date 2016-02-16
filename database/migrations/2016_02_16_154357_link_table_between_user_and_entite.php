<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LinkTableBetweenUserAndEntite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for associating roles to users (Many-to-Many)
        Schema::create('entite_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('entite_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('entite_id')->references('id')->on('entites')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'entite_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('entite_user');
    }
}
