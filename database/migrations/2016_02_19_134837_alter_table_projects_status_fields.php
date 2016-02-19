<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableProjectsStatusFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function($table){
            $table->dropColumn('status');
        });

        Schema::table('projects', function($table){

            $table->enum(
                'status',
                [
                    'draft',
                    'waiting_advance_payment',
                    'development',
                    'test',
                    'waiting_payment',
                    'delivered'
                ]
            )->default('draft');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function($table){
            $table->dropColumn('status');
        });
    }
}
