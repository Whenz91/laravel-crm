<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage projects']);
        Permission::create(['name' => 'create projects']);
        Permission::create(['name' => 'edit own projects']);
        Permission::create(['name' => 'delete own projects']);
        Permission::create(['name' => 'manage tasks']);
        Permission::create(['name' => 'create tasks']);
        Permission::create(['name' => 'edit own tasks']);
        Permission::create(['name' => 'delete own tasks']);

        // create roles
        Role::create(['name' => 'admin'])->givePermissionTo(['manage users', 'manage projects', 'manage tasks']);
        Role::create(['name' => 'user'])->givePermissionTo(['create projects', 'edit own projects', 'delete own projects', 'create tasks', 'edit own tasks', 'delete own tasks']);
    }
}
