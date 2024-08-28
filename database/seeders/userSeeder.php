<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $providers = [
            [
                'first_name' => 'مجید',
                'last_name' => 'نظری',
                'email' => 'majidnazarister@gmail.com', //Hash::make('password123'),
                'password' => Hash::make('12345678'),
                'national_code' => '0310028213',
                'national_company_code' => '',
                'mobile' => '09372120890',
                'phone' => '',
                'credit' => '800000',
                'status' => 'Active',
                'user_type' => 'Private'
            ],

        ];

        // Insert data into the providers table
        DB::table('users')->insert($providers);
    }
}
