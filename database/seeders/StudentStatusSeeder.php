<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('student_statuses')->upsert(
    [
        [
            'status_kh' => 'កំពុងសិក្សា',
            'status_en' => 'Active',
            'is_active' => true,
            'description' => 'Student is currently studying',
            'created_at' => $now,
            'updated_at' => $now,
        ],
        [
            'status_kh' => 'ផ្អាកការសិក្សា',
            'status_en' => 'Suspended',
            'is_active' => false,
            'description' => 'Temporarily suspended',
            'created_at' => $now,
            'updated_at' => $now,
        ],
        [
            'status_kh' => 'បញ្ចប់ការសិក្សា',
            'status_en' => 'Graduated',
            'is_active' => false,
            'description' => 'Student has graduated',
            'created_at' => $now,
            'updated_at' => $now,
        ],
    ],
    ['status_kh', 'status_en'],
    ['is_active', 'description', 'updated_at']
);

    }
}
