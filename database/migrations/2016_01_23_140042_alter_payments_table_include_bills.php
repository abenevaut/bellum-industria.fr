<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPaymentsTableIncludeBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function($table){
            $table->dropColumn('facture_reference');
            $table->dropColumn('amount');

            $table->string('bill_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function($table){
            $table->dropColumn('bill_id');

            $table->string('facture_reference')->unique();
            $table->string('amount');
        });
    }
}
