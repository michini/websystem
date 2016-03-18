<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoFilmadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_filmador',function(Blueprint $table){
            $table->increments('id');
            $table->integer('evento_id')->unsigned();
            $table->integer('filmador_id')->unsigned();
            $table->foreign('evento_id')->references('id')->on('eventos');
            $table->foreign('filmador_id')->references('id')->on('filmadores');
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
        Schema::drop('evento_filmador');
    }
}
