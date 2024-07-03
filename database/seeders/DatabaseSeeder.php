<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('school_class_subject')->truncate();
        DB::table('school_classes')->truncate();
        DB::table('subjects')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call([
            SchoolClassSeeder::class,
            SubjectSeeder::class,
            SchoolClassSubjectSeeder::class,
        ]);
    }

}
