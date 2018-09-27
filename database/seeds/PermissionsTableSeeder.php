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
        factory(App\Models\Permission::class, 5)->create()->each(function ($item) {
            $item->permissionDetails()->saveMany(factory(App\Models\PermissionDetail::class, 5)->make());
        });
    }
}
