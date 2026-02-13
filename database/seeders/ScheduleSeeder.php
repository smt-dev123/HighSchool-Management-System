<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Schedule::upsert([
            [
                'class_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ],
        // conflict column
        ['class_id'],
        // update columns
        ['updated_at']
        );
    }
}
