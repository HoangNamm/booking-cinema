<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cinemafilms = App\Models\CinemaFilm::all()->pluck('id')->toArray();
        $rooms = App\Models\Room::all()->pluck('id')->toArray();
        factory(App\Models\Schedule::class, 10)->create([
            'cinema_film_id' => array_random($cinemafilms),
            'room_id' => array_random($rooms)
        ]);
    }
}
