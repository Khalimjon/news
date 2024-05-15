<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create super admin role
        $superAdminRole = Role::create(['name' => 'super_admin']);

        // Create admin role
        $adminRole = Role::create(['name' => 'admin']);

        // Create blogger role
        $bloggerRole = Role::create(['name' => 'blogger']);



        // Get all permissions
        $allPermissions = Permission::pluck('id')->all();

        // Assign all permissions to super admin role
        $superAdminRole->syncPermissions($allPermissions);


        // Get all permissions except creating admins
        $adminPermissions = Permission::where('name', '!=', 'create admin')->pluck('id')->all();

        // Assign permissions to admin role
        $adminRole->syncPermissions($adminPermissions);

        // Define permissions for CRUD operations
        $bloggerPermissions = [
            'create post',
            'read post',
            'update post',
            'delete post',
        ];

        // Assign permissions to blogger role
        $bloggerRole->syncPermissions($bloggerPermissions);

        //Assign role

    }
}
