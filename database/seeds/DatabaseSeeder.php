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
        if(config('database.default')!=='sqlite'){
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }
        // Role comes before User seeder here.
        $this->call(RoleTableSeeder::class);
        // User seeder will use the roles above created.
        App\User::truncate();
        $this->call(UserTableSeeder::class);
        // Admin seeder will use the roles above created.
        $this->call(AdminTableSeeder::class);

        App\Dev::truncate();
        // Development seeder will be genereated.
//        $this->call(DevelopmentTableSeeder::class);
        if(config('database.default')!=='sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}
