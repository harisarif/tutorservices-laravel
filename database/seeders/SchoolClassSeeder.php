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
            ['name' => 'Class 1'],
            ['name' => 'Class 2'],
            ['name' => 'Class 3'],
            ['name' => 'FSc Pre-Medical'],
            ['name' => 'FSc Pre-Engineering'],
            ['name' => 'ICS'],
            ['name' => 'BSc'],
            ['name' => 'BSCS'],
        ];

        foreach ($classes as $class) {
            SchoolClass::create($class);
        }
    }
}
