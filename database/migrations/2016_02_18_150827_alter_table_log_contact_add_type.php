<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableLogContactAddType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('log_contacts', function($table){
            $table->enum('type', ['prospecting', 'account_activation'])->default('prospecting');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_contacts', function($table){
            $table->dropColumn('type');
        });
    }
}
