<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attendance::upsert([
            [
                'class_id' => 1,
                'time_id' => 1,
                'day_id' => 1,
                'subject_grade_id' => 1,
                'teacher_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class_id' => 1,
                'time_id' => 2,
                'day_id' => 2,
                'subject_grade_id' => 2,
                'teacher_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ],
        // unique condition
        ['class_id', 'time_id', 'day_id', 'subject_grade_id', 'teacher_id'],
        // columns to update
        []
        );
    }
}
