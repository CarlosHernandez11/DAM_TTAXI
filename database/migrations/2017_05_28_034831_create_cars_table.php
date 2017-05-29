<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars',function (Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('brand');
            $table->string('model');
            $table->string('year');
            $table->string('starting_km');
            $table->string('current_km');
            $table->string('cylinder');
            $table->string('fuel');
            $table->string('color');
            $table->string('unit_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cars');
    }
}
