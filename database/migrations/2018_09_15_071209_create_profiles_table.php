<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('photo')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->bigInteger('phonenum')->nullable();
            $table->boolean('isagent')->default(0);
            $table->boolean('isbongah')->default(0);
            $table->integer('location_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('score')->default(0);
            $table->bigInteger('zip')->nullable();
            $table->text('comment')->nullable();
            $table->string('mapcode')->nullable();
        });
        Schema::table('profiles',function(Blueprint $table){
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
        Schema::dropIfExists('profiles');
    }
}
