<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

use Log;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFilePath = __DIR__ . '/Data/cities.json';

        if (!File::exists($jsonFilePath)) {
            $this->command->error("File not found: $jsonFilePath");
            return;
        }
        $json = File::get($jsonFilePath);
        $cities = json_decode($json, true);
        $cities = array_map(function ($city) {
            return [
                'fa_name' => $city['faName'],
                'province_id' => $city['provinceId'],
                //'fa_name' => $city['countryId'],
                'chapar_code' => $city['chaparNumber'],
                'mahex_code' => $city['mahexNumber'],
                'post_code' => $city['postNumber'],
                'tipax_code' => $city['tipaxCityId'],
                'shop_id' => $city['postShop'],
                //'country_id' => $this->getCountryId($city['country']),  // Map country to country_id
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $cities);

        DB::table('cities')->insert($cities);
    }
}
