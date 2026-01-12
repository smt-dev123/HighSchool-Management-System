<?php

namespace Database\Seeders;

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
        DB::table(table: 'student_statuses')->upsert(
            [
                ['id' => 1, 'status_kh' => 'កំពុងសិក្សា', 'status_en' => 'Studying', 'description' => 'កំពុងសិក្សា'],
                ['id' => 2, 'status_kh' => 'ផ្អាកការសិក្សា', 'status_en' => 'Suspend', 'description' => 'ផ្អាកការសិក្សា'],
                ['id' => 3, 'status_kh' => 'បញ្ចប់ការសិក្សា', 'status_en' => 'Graduated', 'description' => 'បញ្ចប់ការសិក្សា'],
                ['id' => 4, 'status_kh' => 'ផ្ទេរការសិក្សា', 'status_en' => 'Transferred', 'description' => 'ផ្ទេរការសិក្សា'],
                ['id' => 5, 'status_kh' => 'បោះបង់ការសិក្សា', 'status_en' => 'Dropped out', 'description' => 'បោះបង់ការសិក្សា'],
            ],
            ['id'],
            ['status_kh', 'status_en', 'description']
        );
    }
}
