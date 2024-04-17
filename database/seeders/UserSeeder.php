<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::truncate();
        // Add a new record
        User::create([
            'name' => 'Admin',
            'email' => 'dev@admin.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'branch_id' => 1, 
            'user_type'=>1
            // Add more columns and values as needed
        ]);
    }
}
