<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\City;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ServiceType;
use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class addOtherInfo extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Branch::truncate();
        Branch::create([
            'name'=>'Admin Branch',
            'description'=>'Default Branch'
        ]);


        Zone::truncate();
        Zone::create([
            'name'=>'Default Zone',
            'description'=> "Default Zone added by default",
            'branch_id'=>1,
        ]);


        City::truncate();
        City::create([
            'name'=>'Default City',
            'tax'=>16.00,
            'zone_id'=>1,
        ]);

        Customer::truncate();
        Customer::create([
            'name'=>'Walk In',
            'client_code'=>1001,
            'password'=>bcrypt(1122),
            'city_id'=>1,
            'address'=>'Walk In customer default address'
        ]);
        ServiceType::truncate();
        ServiceType::insert([
            'name'=>'Overnight', 
            'description'=>'2 days service type'
        ],[ 
            'name'=>'Same Day', 
            'description'=>'1 days service type'
        ],[ 
            'name'=>'Cash on Delivery', 
            'description'=>'Cash on Delivery Service Type'
        ]);
        

        Product::truncate();
        Product::insert([
            'name'=>'COD', 
            'description'=>'COD type product'
        ],[
            'name'=>'NON COD', 
            'description'=>'NON COD type product'
        ]);
    }
}
