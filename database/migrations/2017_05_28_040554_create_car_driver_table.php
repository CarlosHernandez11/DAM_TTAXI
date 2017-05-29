<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarDriverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_drivers',function (Blueprint $table){
            $table->engine='InnoDB';
            $table->integer('car_id')->unsigned();
            $table->integer('driver_id')->unsigned();
        });
        Schema::table('car_drivers',function (Blueprint $table){
            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->foreign('car_id')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('car_drivers');
    }
}
