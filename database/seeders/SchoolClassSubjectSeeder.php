<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SchoolClass;
use App\Models\Subject;
class SchoolClassSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $classes = SchoolClass::all();
        $subjects = Subject::all();

        // Define relationships
        $classSubjectMapping = [
            'Class 1' => ['Math', 'Science', 'English'],
            'Class 2' => ['Math', 'Science', 'History'],
            'Class 3' => ['Math', 'Geography', 'English'],
            'FSc Pre-Medical' => ['Biology', 'Chemistry', 'Physics'],
            'FSc Pre-Engineering' => ['Math', 'Physics', 'Chemistry'],
            'ICS' => ['Math', 'Physics', 'Computer Science'],
            'BSc' => ['Math', 'Physics', 'Computer Science'],
            'BSCS' => ['Math', 'Computer Science', 'English'],
        ];

        foreach ($classSubjectMapping as $className => $subjectNames) {
            $class = $classes->where('name', $className)->first();
            if ($class) {
                $subjectIds = $subjects->whereIn('name', $subjectNames)->pluck('id')->toArray();
                $class->subjects()->syncWithoutDetaching($subjectIds);
            }
        }
    }
}
