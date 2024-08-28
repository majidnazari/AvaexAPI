<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\File;


class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFilePath = __DIR__ . '/Data/countries.json';

        if (!File::exists($jsonFilePath)) {
            $this->command->error("File not found: $jsonFilePath");
            return;
        }

        $json = File::get($jsonFilePath);


        $countries = json_decode($json, true);

        $countries = array_map(function ($country) {
            return [
                'fa_name' => $country['faName'],
                'en_name' => $country['enName'],
                'code' => $country['code'],

                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $countries);

        DB::table('countries')->insert($countries);
    }
}
