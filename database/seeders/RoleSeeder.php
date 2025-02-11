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

        $manageUsers = Permission::create(['name' => 'manage-user']);
        $manageAccounts = Permission::create(['name' => 'manage-accounts']);
        $manageTransactions = Permission::create(['name' => 'manage-transactions']);

        $adminRole = Role::create(['name' => 'admin']);
        $accountManagerRole = Role::create(['name' => 'account-manager']);
        $tellerRole = Role::create(['name' => 'teller']);

        $adminRole->givePermissionTo([$manageUsers, $manageAccounts, $manageTransactions]);
        $accountManagerRole->givePermissionTo([$manageAccounts, $manageTransactions]);
        $tellerRole->givePermissionTo($manageTransactions);

        $adminUser = User::create([
            'name' => 'User 1',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $managerUser = User::create([
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('manager111'),
        ]);

        $tellerUser = User::create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => bcrypt('teller111'),
        ]);

        $adminUser->assignRole($adminRole);
        $managerUser->assignRole($accountManagerRole);
        $tellerUser->assignRole($tellerRole);

    }
}
