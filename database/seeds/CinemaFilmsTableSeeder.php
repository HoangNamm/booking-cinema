<?php

use Illuminate\Database\Seeder;

class CinemaFilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cinemas = App\Models\Cinema::all()->pluck('id')->toArray();
        $films = App\Models\Film::all()->pluck('id')->toArray();
        for ($i = 0; $i < 10; $i++) { 
            DB::table('cinema_film')->insert([
                'cinema_id' => array_random($cinemas),
                'film_id' => array_random($films)
            ]);
        }
    }
}
