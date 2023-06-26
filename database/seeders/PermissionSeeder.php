<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'user.*']);
        Permission::create(['name' => 'user.view']);
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.update']);
        Permission::create(['name' => 'user.delete']);

        Permission::create(['name' => 'inventory.*']);
        Permission::create(['name' => 'inventory.view']);
        Permission::create(['name' => 'inventory.create']);
        Permission::create(['name' => 'inventory.update']);
        Permission::create(['name' => 'inventory.delete']);

        Permission::create(['name' => 'product.*']);
        Permission::create(['name' => 'product.view']);
        Permission::create(['name' => 'product.create']);
        Permission::create(['name' => 'product.update']);
        Permission::create(['name' => 'product.delete']);

        Permission::create(['name' => 'category.*']);
        Permission::create(['name' => 'category.view']);
        Permission::create(['name' => 'category.create']);
        Permission::create(['name' => 'category.update']);
        Permission::create(['name' => 'category.delete']);

        Permission::create(['name' => 'lokasi.*']);
        Permission::create(['name' => 'lokasi.view']);
        Permission::create(['name' => 'lokasi.create']);
        Permission::create(['name' => 'lokasi.update']);
        Permission::create(['name' => 'lokasi.delete']);

        Permission::create(['name' => 'rak.*']);
        Permission::create(['name' => 'rak.view']);
        Permission::create(['name' => 'rak.create']);
        Permission::create(['name' => 'rak.update']);
        Permission::create(['name' => 'rak.delete']);

        $role_admin = Role::create(['name' => 'admin']);
        $role_super_admin = Role::create(['name' => 'super-admin']);

        $role_admin->givePermissionTo('inventory.*');
        $role_admin->givePermissionTo('product.*');
        $role_admin->givePermissionTo('category.*');
        $role_admin->givePermissionTo('lokasi.*');
        $role_admin->givePermissionTo('rak.*');

        $role_super_admin->givePermissionTo(Permission::all());

        $user_super_admin = User::find(1);
        $user_super_admin->assignRole('super-admin');

        $user_admin = User::find(2);
        $user_admin->assignRole('admin');
    }
}
