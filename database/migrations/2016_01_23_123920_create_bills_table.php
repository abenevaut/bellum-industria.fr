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
            $table->string('reference')->unique();
            $table->date('date_emission');
            $table->string('currency');
            $table->timestamps();
        });

        Schema::create('bills_parts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('designation');
            $table->string('quantity');
            $table->string('unit_price_without_vat');
            $table->string('price_without_vat');
            $table->string('amount_vat');
            $table->timestamps();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('bill_billpart', function (Blueprint $table) {
            $table->integer('bill_id')->unsigned();
            $table->integer('bill_part_id')->unsigned();

            $table->foreign('bill_id')->references('id')->on('bills')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('bill_part_id')->references('id')->on('bills_parts')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['bill_id', 'bill_part_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bill_billpart');
        Schema::drop('bills');
        Schema::drop('bills_parts');
    }
}
