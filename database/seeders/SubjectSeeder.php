<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;
class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $subjects = [
            ['name' => 'Math'],
            ['name' => 'Science'],
            ['name' => 'History'],
            ['name' => 'English'],
            ['name' => 'Geography'],
            ['name' => 'Biology'],
            ['name' => 'Physics'],
            ['name' => 'Chemistry'],
            ['name' => 'Computer Science'],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
