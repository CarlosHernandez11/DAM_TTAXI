<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table){
            $table->engine='InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('permission_number');
            $table->string('address');
            $table->string('syndicate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drivers');
    }
}
