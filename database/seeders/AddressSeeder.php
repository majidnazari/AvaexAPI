<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $providers = [
            [
                'user_id' => 1,
                'city_id' => 1840, //مشهد
                'title' => 'شرکت',
                'postal_code' => '9185993186',
                'blv_name' => 'قرنی',
                'street_name' => 'قرنی 21',
                'building_no' => 'مجد 3',
                'floor' => '8',
                'unit_number' => '805',
                'unit_no' => '805',
                'is_sender' => 1,
                'first_name' => '',
                'last_name' => '',
                'mobile' => '',
                'phone' => '',
                'description' => '',

            ],
            [
                'user_id' => 1,
                'city_id' => 2653,
                'title' => 'منزل',
                'postal_code' => '3381835334',
                'blv_name' => 'شریعتی',
                'street_name' => '',
                'building_no' => 'درمانگاه شبانه روزی رازی',
                'floor' => '',
                'unit_number' => '',
                'unit_no' => '',
                'is_sender' => 0,
                'first_name' => '',
                'last_name' => '',
                'mobile' => '09199694106',
                'phone' => '36733221',
                'description' => '',

            ],

        ];

        // Insert data into the providers table
        DB::table('addresses')->insert($providers);
    }
}
