<?php

namespace Database\Seeders;

use App\Models\ScheduleLine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         ScheduleLine::upsert([
            [
                'schedule_id' => 1,
                'time_id' => 1,
                'day_id' => 1,
                'subject_grade_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'schedule_id' => 1,
                'time_id' => 2,
                'day_id' => 1,
                'subject_grade_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'schedule_id' => 1,
                'time_id' => 1,
                'day_id' => 2,
                'subject_grade_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ],
        // unique columns
        ['schedule_id', 'time_id', 'day_id'],
        // columns to update
        ['subject_grade_id', 'updated_at']
        );
    }
}
