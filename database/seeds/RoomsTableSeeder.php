<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = array('Room 01', 'Room 02', 'Room 03', 'Room 04'
                        , 'Room 05', 'Room 06', 'Room 07');
        $cinemas = App\Models\Cinema::all()->pluck('id')->toArray();
        for ($i=0; $i < count($cinemas); $i++) { 
            for ($j = 0; $j < count($rooms); $j++) { 
                DB::table('rooms')->insert([
                    'name' => $rooms[$j],
                    'cinema_id' => $cinemas[$i]
                ]);
            }
        }
    }
}
