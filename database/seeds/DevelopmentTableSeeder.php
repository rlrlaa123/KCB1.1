<?php

use Illuminate\Database\Seeder;

class DevelopmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Dev::truncate();
        factory(\App\Dev::class,100)->create();
    }
}
