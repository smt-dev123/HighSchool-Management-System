<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classes::upsert([
            [
                'name' => 'Grade 1 - A',
                'class_type_id' => 1,
                'grade_level_id' => 1,
                'academic_year_id' => 1,
                'other' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grade 2 - A',
                'class_type_id' => 1,
                'grade_level_id' => 2,
                'academic_year_id' => 1,
                'other' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ],
        // unique condition
        ['name', 'academic_year_id'],
        // columns to update if exists
        ['class_type_id', 'grade_level_id', 'other', 'updated_at']
        );
    }
}
