<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = App\Models\Role::all()->pluck('id')->toArray();
        $actions = App\Models\Action::all()->pluck('id')->toArray();
        for ($i = 0; $i < count($roles); $i++) {
            factory(App\Models\Permission::class, 4)->create([
                'role_id' => array_random($roles),
                'action_id' => array_random($actions)
            ]);
        }
    }
}
