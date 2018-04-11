<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user  = \App\Role::where('name', 'user')->first();
        $role_premium  = \App\Role::where('name', 'premium')->first();
        $role_admin = \App\Role::where('name', 'admin')->first();
        $role_author  = \App\Role::where('name', 'author')->first();

        $user = new \App\User();
//        $user->username = 'user';
        $user->name = 'Test User';
        $user->email = 'user@user.com';
        $user->password = bcrypt('secret');
//        $user->phone = '01033334444';
        $user->save();
        $user->roles()->attach($role_user);

        $premium = new \App\User();
//        $premium->username = 'premium';
        $premium->name = 'Test Premium';
        $premium->email = 'premium@premium.com';
        $premium->password = bcrypt('secret');
//        $premium->phone = '01055556666';
        $premium->save();
        $premium->roles()->attach($role_premium);

        $admin = new \App\User();
//        $admin->username = 'admin';
        $admin->name = 'Test Admin';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('secret');
//        $admin->phone = '01011112222';
        $admin->save();
        $admin->roles()->attach($role_admin);

        $author = new \App\User();
//        $author->username = 'author';
        $author->name = 'Test Author';
        $author->email = 'author@author.com';
        $author->password = bcrypt('secret');
//        $author->phone = '01077778888';
        $author->save();
        $author->roles()->attach($role_author);
    }
}
