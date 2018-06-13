<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::truncate();
        $role_admin = \App\Role::where('name', 'admin')->first();
        $role_author  = \App\Role::where('name', 'author')->first();

        $admin = new \App\Admin();
        $admin->username = 'admin';
        $admin->name = 'Test Admin';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('secret');
        $admin->grade = 'admin';
        $admin->save();
        $admin->roles()->attach($role_admin);

        $author = new \App\Admin();
        $author->username = 'author';
        $author->name = 'Test Author';
        $author->email = 'author@author.com';
        $author->password = bcrypt('secret');
        $author->grade = 'author';
        $author->save();
        $author->roles()->attach($role_author);
    }
}
