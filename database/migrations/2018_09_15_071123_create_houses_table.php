<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('build_year');
            $table->string('type');
            $table->integer('rooms');
            $table->boolean('parking');
            $table->boolean('elevator');
            $table->boolean('anbari');
            $table->boolean('balcony');
            $table->integer('floor');
            $table->boolean('RentorSell');
            $table->integer('city');
            $table->integer('location_id')->unsigned()->nullable();
            $table->string('address');
            $table->bigInteger('cost');
            $table->bigInteger('rent')->nullable();
            $table->integer('meterage');
            $table->text('comment')->nullable();
            $table->string('photo')->nullable();
          
            $table->string('mapcode')->nullable();
            $table->bigInteger('zipcode')->nullable();

        });
        Schema::table('houses',function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
