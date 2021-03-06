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

        $user = new \App\User();
        $user->username = 'user';
        $user->name = 'Test User';
        $user->email = 'user@user.com';
        $user->birth = \Faker\Provider\DateTime::dateTimeThisCentury();
        $user->gender= 'M';
        $user->password = bcrypt('secret');
        $user->phone = '01033334444';
        $user->grade = 'user';
        $user->save();
        $user->roles()->attach($role_user);

        $premium = new \App\User();
        $premium->username = 'premium';
        $premium->name = 'Test Premium';
        $premium->email = 'premium@premium.com';
        $premium->birth = \Faker\Provider\DateTime::dateTimeThisCentury();
        $premium->gender = 'M';
        $premium->password = bcrypt('secret');
        $premium->phone = '01055556666';
        $premium->grade = 'premium';
        $premium->save();
        $premium->roles()->attach($role_premium);
    }
}
