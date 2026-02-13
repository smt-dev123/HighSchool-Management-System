<?php

namespace Database\Seeders;

use App\Models\AttendanceLine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AttendanceLine::upsert([
            [
                'attendance_id' => 1,
                'student_id' => 1,
                'attendance_type_id' => 1, // Present
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'attendance_id' => 1,
                'student_id' => 2,
                'attendance_type_id' => 2, // Absent
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ],
        // unique condition
        ['attendance_id', 'student_id'],
        // columns to update
        ['attendance_type_id', 'updated_at']
        );
    }
}
