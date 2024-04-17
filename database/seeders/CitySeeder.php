<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        City::truncate();
        City::create([
            'name' => $faker->city,
            'tax' => 10.00,
            'zone_id' => $faker->randomElements(Zone::get()->pluck('name'))
        ]);
    }
}
