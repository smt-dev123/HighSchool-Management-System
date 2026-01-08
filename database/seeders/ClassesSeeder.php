<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Classes::create([
            'class_type_id' => 1,
            'grade_level_id' => 12,
            'academic_id' => 1,
            'other' => 'Room A1'
        ]);
    }
}
