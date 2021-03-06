<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(ActionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(FilmsTableSeeder::class);
        $this->call(CategoryFilmsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(RatingsTableSeeder::class);
        $this->call(CinemasTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(CinemaFilmsTableSeeder::class);
        $this->call(SchedulesTableSeeder::class);
        $this->call(TicketsTableSeeder::class);
        $this->call(SeatsTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
        $this->call(BookingDetailsTableSeeder::class);
    }
}
