<?php

namespace Database\Seeders;

use App\Models\Time;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Time::upsert([
            [
                'name' => 'Period 1',
                'start_time' => '07:00:00',
                'end_time' => '07:45:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Period 2',
                'start_time' => '07:45:00',
                'end_time' => '08:30:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ],
        ['name'],
        ['start_time', 'end_time', 'updated_at']);
    }
}
