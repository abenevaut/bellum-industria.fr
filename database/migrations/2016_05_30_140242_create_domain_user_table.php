<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for associating roles to users (Many-to-Many)
        Schema::create('domain_user', function (Blueprint $table) {

            $table->integer('user_id')->unsigned();
            $table->integer('domain_id')->unsigned();

            $table
				->foreign('user_id')
				->references('id')
				->on('users')
                ->onUpdate('cascade')
				->onDelete('cascade');

            $table
				->foreign('domain_id')
				->references('id')
				->on('domains')
                ->onUpdate('cascade')
				->onDelete('cascade');

            $table->primary([
            	'user_id',
				'domain_id'
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
        Schema::drop('domain_user');
    }
}
