<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role = [
           [
               'name' => 'admin',
               'guard_name' => 'web'
           ],
           [
               'name' => 'author',
               'guard_name' => 'web'
           ],
           [
               'name' => 'user',
               'guard_name' => 'web'
           ]
        ];

        Role::insert($role);

        $user = User::create([
            'name' => 'super-admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('secretes'),
            'status' => 1
        ]);

        $user->assignRole('admin');
    }
}
