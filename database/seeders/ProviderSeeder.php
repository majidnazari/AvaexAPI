<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $providers = [
            [
                'name' => 'Post',
                'user_name' => 'pishrotravar',
                'password' => 'pishrotravar', //Hash::make('password123'),
                'base_url' => 'https://ecommrestapi.post.ir/',
                'token_url' => 'api/v1/users/Token',
                'base_Token' => '',
                'api_key' => '',
                'grant_type' => 'password',
                'token' => '',
                'refresh_token' => '',
                'expire_date' => now()->addDays(30),
                'status' => 'Active',
            ],
            [
                'name' => 'Tipax',
                'user_name' => 'pishrotarabar@yahoo.com',
                'password' => 'A123456m', //Hash::make('password123'),
                'base_url' => 'https://omtestapi.tipax.ir/',
                'token_url' => 'api/OM/v3/Account/token',

                'base_Token' => '',
                'api_key' => '12594c4090354c4f9a56821615bd6864',
                'grant_type' => '',
                'token' => '',
                'refresh_token' => '',
                'expire_date' => now()->addDays(30),
                'status' => 'Active',
            ],
            [
                'name' => 'Mehax',
                'user_name' => '',
                'password' => '', //Hash::make('password123'),
                'base_url' => 'http://api.mahex.com/',
                'token_url' => '',

                'base_Token' => 'Basic WXFldVVLaVRBeXptVnZtRjJoVGRTZkJUd2tMNnZTZnVwZ05IdVY0VmNXY1lpOUt0Og==',
                'api_key' => '',
                'grant_type' => '',
                'token' => '',
                'refresh_token' => '',
                'expire_date' => now()->addDays(30),
                'status' => 'Active',
            ],
            [
                'name' => 'Chapar',
                'user_name' => '',
                'password' => '', //Hash::make('password123'),
                'base_url' => 'https://app.krch.ir/',
                'token_url' => '',

                'base_Token' => '',
                'api_key' => '',
                'grant_type' => '',
                'token' => '',
                'refresh_token' => '',
                'expire_date' => now()->addDays(30),
                'status' => 'Active',
            ]
            // Add more providers as needed
        ];

        // Insert data into the providers table
        DB::table('providers')->insert($providers);
    }
}
