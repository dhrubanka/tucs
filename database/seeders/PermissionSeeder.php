<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'moderator']);
        $role3 = Role::create(['name' => 'alumni']);
        $role4 = Role::create(['name' => 'professor']);
        $role5 = Role::create(['name' => 'student']);

           // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' =>  Hash::make('admin'),
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'mod1',
            'email' => 'mod1@gmail.com',
            'password' =>  Hash::make('mod1'),
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'alumni',
            'email' => 'alumni1@gmail.com',
            'password' =>  Hash::make('alumni'),
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'name' => 'student1',
            'email' => 'student1@gmail.com',
            'password' =>  Hash::make('student'),
        ]);
        $user->assignRole($role5);

        $user = \App\Models\User::factory()->create([
            'name' => 'professor',
            'email' => 'professor1@gmail.com',
            'password' =>  Hash::make('professor'),
        ]);
        $user->assignRole($role4);


    }
}
