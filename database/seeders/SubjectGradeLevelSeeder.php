<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectGradeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\SubjectGradeLevel::create([
            'subject_id' => 1,
            'grade_level_id' => 12,
            'class_type_id' => 1,
            'full_score' => 100,
            'divide' => 1,
            'average' => 50
        ]);
    }
}
