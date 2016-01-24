<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBillsTableAddDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('bills', function($table){
//            $table->text('description');
//        });
        Schema::table('bills_parts', function($table){
            $table->dropColumn('designation');
        });
        Schema::table('bills_parts', function($table){
            $table->text('designation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bills', function($table){
            $table->dropColumn('description');
        });
        Schema::table('bills_parts', function($table){
            $table->dropColumn('designation');
        });
        Schema::table('bills_parts', function($table){
            $table->string('designation');
        });
    }
}
