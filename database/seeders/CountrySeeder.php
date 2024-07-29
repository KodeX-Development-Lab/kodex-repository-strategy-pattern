<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'name'      => "Malaysia",
                'code'      => 'MY',
                'time_zone' => '',
            ],
            [
                'name'      => "Myanmar",
                'code'      => 'MM',
                'time_zone' => '',
            ],
        ];

        Country::insert($countries);
    }
}
