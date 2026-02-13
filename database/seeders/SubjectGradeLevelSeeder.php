<?php

namespace Database\Seeders;

use App\Models\SubjectGradeLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectGradeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         SubjectGradeLevel::upsert([
            [
                'subject_id' => 1,
                'grade_level_id' => 1,
                'class_type_id' => 1,
                'full_score' => 100,
                'divide' => 2,
                'average' => 50,
                'note' => 'Math for Grade 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subject_id' => 2,
                'grade_level_id' => 1,
                'class_type_id' => 1,
                'full_score' => 100,
                'divide' => 2,
                'average' => 50,
                'note' => 'Khmer for Grade 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ],
        // unique columns
        ['subject_id', 'grade_level_id', 'class_type_id'],
        // columns to update if conflict
        ['full_score','divide','average','note','updated_at']);
    }
}
