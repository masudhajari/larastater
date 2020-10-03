<?php

use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPermissions= Permission::all();

        Role::updateOrCreate([
            'name' => 'Admin',
            'slug' => 'admin',
            'deletable' => false
        ])->permissions()->sync($adminPermissions->pluck('id'));

        Role::updateOrCreate([
            'name' => 'User',
            'slug' => 'user',
            'deletable' => false
        ]);
    }
}
