<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $countries = [
            ['name' => 'United States'],
            ['name' => 'United Kingdom'],
            ['name' => 'Canada'],
            ['name' => 'Australia'],
            ['name' => 'Germany'],
        ];

        Country::insert($countries);
    }
}
