<?php

use Illuminate\Database\Seeder;

class UserPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\Models\User::all();
        $permissions = App\Models\Permission::all();
        factory(App\Models\UserPermission::class,10)->create([
            'user_id' => $users->random()->id,
            'permission_id' => $permissions->random()->id,
        ]);
    }
}
