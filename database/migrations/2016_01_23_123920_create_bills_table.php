<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entite_vendor_id')->unsigned();
            $table->integer('entite_client_id')->unsigned();
            $table->string('reference')->unique();
            $table->date('date_emission');
            $table->string('currency');
            $table->timestamps();
            $table->index(['entite_vendor_id', 'entite_client_id']);
        });

        Schema::create('bills_parts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bill_id')->unsigned();
            $table->string('designation');
            $table->string('quantity');
            $table->string('unit_price_without_vat');
            $table->string('price_without_vat');
            $table->string('amount_vat');
            $table->timestamps();
            $table->index(['bill_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bills');
        Schema::drop('bills_parts');
    }
}
