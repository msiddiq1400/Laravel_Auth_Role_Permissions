<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'users.list']);
        Permission::create(['name' => 'users.view']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.update']);
        Permission::create(['name' => 'users.delete']);

        //admin role and permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(
            'users.list',
            'users.view',
            'users.create',
            'users.update',
            'users.delete'
        );
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);
        $admin->assignRole('admin');

        //user role and permissions
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo(
            'users.list'
        );
        $user = User::create([
            'name' => 'Siddiq',
            'email' => 'sid@gmail.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('user');
    }
}