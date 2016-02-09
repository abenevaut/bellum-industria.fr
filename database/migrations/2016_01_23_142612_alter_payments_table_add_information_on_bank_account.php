<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPaymentsTableAddInformationOnBankAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('reference')->unique();
            $table->string('iban')->unique();
            $table->string('bic')->unique();
            $table->enum('status', ['active', 'disabled'])->default('active');
        });

        Schema::table('payments', function($table){
            $table->string('bank_account_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bank_accounts');
        Schema::table('payments', function($table){
            $table->dropColumn('bank_account_id');
        });
    }
}
