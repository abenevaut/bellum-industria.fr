<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('bounds_south');
            $table->string('bounds_west');
            $table->string('bounds_north');
            $table->string('bounds_east');
            $table->string('streetNumber');
            $table->string('cityDistrict')->nullable();
            $table->string('city');
            $table->string('zipcode');
            $table->string('county');
            $table->string('countyCode');
            $table->string('region');
            $table->string('regionCode');
            $table->string('country');
            $table->string('countryCode');
            $table->string('timezone')->nullable();
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
        Schema::drop('addresses');
    }
}
