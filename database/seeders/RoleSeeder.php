<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Can do anything!
        $admin = Role::create([
            'name' => 'admin'
        ]);

        // Can manage users
        $userAdmin = Role::create([
            'name' => 'user-admin'
        ]);

        $userPermissionNames = [
            'users.update',
            'users.delete',
            'users.view'
        ];

        $collectionPermissions = [
            'collections.update',
            'collections.delete',
            'collections.view'
        ];

        foreach([$userPermissionNames, $collectionPermissions] as $permissionNames)
            foreach($permissionNames as $name)
                Permission::create(compact('name'));

        $userAdmin->givePermissionTo(Permission::where('name', 'like', 'users.%')->get());

        $admin->givePermissionTo(Permission::all());
    }
}
