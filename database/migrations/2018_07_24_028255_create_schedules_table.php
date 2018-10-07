<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cinema_film_id');
            $table->unsignedInteger('room_id');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->foreign('cinema_film_id')
                    ->references('id')
                    ->on('cinema_film');
            $table->foreign('room_id')
                    ->references('id')
                    ->on('rooms');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
