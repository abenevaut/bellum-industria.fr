<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email');
            $table->string('subject');
            $table->text('message');
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
        Schema::drop('log_contacts');
    }
}
