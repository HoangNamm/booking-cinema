<?php

use Illuminate\Database\Seeder;

class PermissionDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = App\Models\Permission::all();
        factory(App\Models\PermissionDetail::class)->create([
            'permission_id' => $permissions->random()->id,
        ]);
    }
}
