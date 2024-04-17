<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\City;
use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        Customer::truncate();
        // Add a new record
        Customer::create([
            'branch_id' => $faker->randomElements(Branch::pluck('id')->toArray()),
            'name' => $faker->name,
            'client_code' => 'admin',
            'password' => bcrypt('password'),
            'phone' => 1, 
            'email'=>$faker->unique()->safeEmail,
            'sale_tax'=> 10.00,
            'fuel_surcharge'=> 20.00,
            'city_id'=> $faker->randomElements(City::pluck('id')->toArray()),
            'address'=> $faker->address,
            // Add more columns and values as needed
        ]);
    }
}
