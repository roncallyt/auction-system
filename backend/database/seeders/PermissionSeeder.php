<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Administrator's permissions
        $administrator = Role::create(['name' => 'administrator']);

        $permission = Permission::create(['name' => 'list auctions']);
        $permission->assignRole($administrator);

        $permission = Permission::create(['name' => 'create auction']);
        $permission->assignRole($administrator);

        $permission = Permission::create(['name' => 'show auction']);
        $permission->assignRole($administrator);

        $permission = Permission::create(['name' => 'edit auction']);
        $permission->assignRole($administrator);

        $permission = Permission::create(['name' => 'delete auction']);
        $permission->assignRole($administrator);

        // User's permissions
        $user = Role::create(['name' => 'user']);

        $permission = Permission::create(['name' => 'show profile']);
        $permission->assignRole($user);

        $permission = Permission::create(['name' => 'edit profile']);
        $permission->assignRole($user);

        $permission = Permission::create(['name' => 'show opened auctions']);
        $permission->assignRole($user);

        $permission = Permission::create(['name' => 'bid opened auctions']);
        $permission->assignRole($user);

        $permission = Permission::create(['name' => 'track auctions']);
        $permission->assignRole($user);
    }
}
