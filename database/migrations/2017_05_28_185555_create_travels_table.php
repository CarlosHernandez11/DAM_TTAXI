<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels',function (Blueprint $table){
            $table->engine="InnoDB";
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('latitud');
            $table->string('longitud');
            $table->integer('driver_id')->unsigned()->default(1);
            $table->string('travel_status_user')->default('E'); //E = Espera, A = Asignado, T = Terminado, C = Cancelado
            $table->string('travel_status_driver')->default('E'); //E = Sin Asignar , A = Asignado, T = Terminado, C = Cancelado

        });

        Schema::table('travels',function (Blueprint $table){
            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('travels');
    }
}
