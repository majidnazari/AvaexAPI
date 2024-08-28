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
                'token_url' => 'api/v1/users/token',
                'base_Token' => '',
                'api_key' => '',
                'grant_type' => 'password',
                'access_token' => '',
                'refresh_token' => '',
                'expires_in' => null,
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
                'access_token' => '',
                'refresh_token' => '',
                'expires_in' => null,
                'status' => 'Active',
            ],
            [
                'name' => 'Mehax',
                'user_name' => '',
                'password' => '', //Hash::make('password123'),
                'base_url' => 'http://api.mahex.com/',
                'token_url' => 'v2/',

                'base_Token' => 'Basic WXFldVVLaVRBeXptVnZtRjJoVGRTZkJUd2tMNnZTZnVwZ05IdVY0VmNXY1lpOUt0Og==',
                'api_key' => '',
                'grant_type' => '',
                'access_token' => '',
                'refresh_token' => '',
                'expires_in' => null,
                'status' => 'Active',
            ],
            [
                'name' => 'Chapar',
                'user_name' => 'pishro.tarabar',
                'password' => '6699@@', //Hash::make('password123'),
                'base_url' => 'https://app.krch.ir/',
                'token_url' => 'v1/',

                'base_Token' => 'mahyar.shargh', // user name for cod
                'api_key' => '',
                'grant_type' => '',
                'access_token' => '',
                'refresh_token' => '',
                'expires_in' => null,
                'status' => 'Active',
            ]
            // Add more providers as needed
        ];

        // Insert data into the providers table
        DB::table('providers')->insert($providers);
    }
}
