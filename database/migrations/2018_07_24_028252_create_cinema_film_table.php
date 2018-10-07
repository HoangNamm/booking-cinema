<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCinemaFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinema_film', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cinema_id');
            $table->unsignedInteger('film_id');
            $table->foreign('cinema_id')
                    ->references('id')
                    ->on('cinemas');
            $table->foreign('film_id')
                    ->references('id')
                    ->on('films');
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
        Schema::dropIfExists('cinema_film');
    }
}
