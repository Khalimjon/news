<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         // Create roles
         $writer = Role::create(['name' => 'writer']);
         $admin = Role::create(['name' => 'admin']);
         $reader = Role::create(['name' => 'reader']);

         // Find or create permissions
         $editNewsPermission = Permission::firstOrCreate(['name' => 'edit news']);
         $deleteNewsPermission = Permission::firstOrCreate(['name' => 'delete news']);
         $readNewsPermission = Permission::firstOrCreate(['name' => 'read news']);

         // Assign permissions to roles
         $admin->syncPermissions([$editNewsPermission, $deleteNewsPermission, $readNewsPermission]);
         $writer->givePermissionTo($editNewsPermission);
         $reader->givePermissionTo($readNewsPermission);

         // Find the user by ID
         $user = User::find(1);

         // Assign roles to the user
         $user->assignRole('admin');

    }
}
