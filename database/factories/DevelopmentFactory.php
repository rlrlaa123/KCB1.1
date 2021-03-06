<?php

use Faker\Generator as Faker;

$factory->define(\App\Dev::class, function (Faker $faker) {
    $cities = \Illuminate\Support\Facades\DB::table('dev_location')->select('dev_city')->get();
    $types = \Illuminate\Support\Facades\DB::table('search_type')->select('search_type')->get();
    $charges = \Illuminate\Support\Facades\DB::table('search_charge')->select('search_charge')->get();

    $city_array = array();
    $type_array = array();
    $charge_array = array();
    foreach($cities as $city) {
        array_push($city_array,$city->dev_city);
    }
    foreach($types as $type) {
        array_push($type_array,$type->search_type);
    }
    foreach($charges as $charge) {
        array_push($charge_array,$charge->search_charge);
    }

    $city = $faker->randomElement($city_array);
    $districts = \Illuminate\Support\Facades\DB::table('dev_location')->where('dev_city', $city)->get();
    $district_array = array();
    foreach($districts as $district) {
        array_push($district_array,$district->dev_district);
    }

    return [
        'dev_title' => $faker->word,
        'dev_initiated_log' => $faker->word,
        'dev_initiated_date' => $faker->date(),
        'dev_fileimage' => $faker->word,
        'dev_comment' => $faker->word,
        'dev_city' => $city,
        'dev_district' => $faker->randomElement($district_array),
        'dev_type' => $faker->randomElement($type_array),
        'dev_charge' => $faker->randomElement($charge_array),
        'dev_method' => $faker->word,
        'dev_area_size' => $faker->numberBetween(10),
        'dev_applied_law' => $faker->word,
        'dev_publicly_starting_date' => $faker->date(),
        'dev_future_plan' => $faker->word,
        'created_at' => \Carbon\Carbon::now(),
        'dev_status' => $faker->word,
    ];
});
