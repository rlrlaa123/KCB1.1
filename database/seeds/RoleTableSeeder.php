<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::truncate();
        $role_user = new \App\Role();
        $role_user->name = 'user';
        $role_user->description = 'free user';
        $role_user->save();

        $role_premium = new \App\Role();
        $role_premium->name = 'premium';
        $role_premium->description = 'premium user';
        $role_premium->save();

        $role_admin = new \App\Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'administrator';
        $role_admin->save();

        $role_author = new \App\Role();
        $role_author->name = 'author';
        $role_author->description = 'middle administrator';
        $role_author->save();
    }
}
