<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = App\Models\Role::all()->pluck('id')->toArray();
        factory(App\Models\User::class,10)->create([
            'role_id' => array_random($roles)
        ]);
    }
}
