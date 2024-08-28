<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



use Illuminate\Support\Facades\File;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFilePath = __DIR__ . '/Data/provinces.json';

        if (!File::exists($jsonFilePath)) {
            $this->command->error("File not found: $jsonFilePath");
            return;
        }
        $json = File::get($jsonFilePath);
        $provinces = json_decode($json, true);
        $provinces = array_map(function ($province) {
            return [
                'fa_name' => $province['faName'],
                'en_name' => $province['enName'],
                'country_id' => $province['countryId'],

                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $provinces);

        DB::table('provinces')->insert($provinces);
    }
}
