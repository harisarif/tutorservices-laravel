<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SchoolClass;
class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $classes = [
            ['name' => 'Please Select'],
            ['name' => 'Diploma/Certifications'],
            ['name' => 'A Level'],
            ['name' => 'Montessori'],
            ['name' => 'ACCA'],
            ['name' => 'IGCSE'],
            ['name' => 'Class 1 to 5'],
            ['name' => 'Class 6 to 8'],
            ['name' => 'Matric'],
            ['name' => 'Intermediate'],
            ['name' => 'O Level'],
            ['name' => 'Bachelors'],
            ['name' => 'Masters'],
            ['name' => 'Entery Test Prep'],
            ['name' => 'IETLS/TOEFL'],
            ['name' => 'Language Training'],
            ['name' => 'Quran'],
        ];

        foreach ($classes as $class) {
            SchoolClass::create($class);
        }
    }
}
