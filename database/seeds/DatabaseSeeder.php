<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role comes before User seeder here.
        $this->call(RoleTableSeeder::class);
        // User seeder will use the roles above created.
        $this->call(UserTableSeeder::class);
        // Admin seeder will use the roles above created.
        $this->call(AdminTableSeeder::class);
        // Development seeder will be genereated.
        $this->call(DevelopmentTableSeeder::class);
    }
}
