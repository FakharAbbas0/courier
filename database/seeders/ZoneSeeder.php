<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        Zone::truncate();
        Zone::create([
            'name' => $faker->city."(Zone)",
            'description' => $faker->paragraph,
            'branch_id' => $faker->randomElements(Branch::pluck('id')->toArray())
        ]);
    }
}
