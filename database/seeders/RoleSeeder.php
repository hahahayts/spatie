<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Permissions
        $viewEvents = Permission::create(['name' => 'view-events']);
        $manageEvents = Permission::create(['name' => 'manage-events']);
        $manageTransactions = Permission::create(['name' => 'manage-transactions']);
        $manageManageUsers = Permission::create(['name' => 'manage-users']);

        // Create Roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Assign Permissions to Roles
        $adminRole->givePermissionTo([$viewEvents, $manageEvents, $manageTransactions, $manageManageUsers]);
        $userRole->givePermissionTo([$viewEvents]);

        // Create Users
        $adminUser = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin111'),
        ]);
        $harvey = User::create([
            'name' => 'harvey',
            'email' => 'harvey@gmail.com',
            'password' => bcrypt('harvey111'),
        ]);

        // Assign Roles to Users
        $adminUser->assignRole($adminRole);
        $harvey->assignRole($userRole);
    }
}
