<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table(table: 'teacher_statuses')->upsert(
            [
                ['id' => 1, 'status_kh' => 'គ្រូផ្ទេរ', 'status_en' => '', 'other' => ''],
                ['id' => 3, 'status_kh' => 'គ្រូប្រចាំមណ្ឌល', 'status_en' => '', 'other' => ''],
                ['id' => 4, 'status_kh' => 'គ្រូប្រចាំវិទ្យាស្ថាន', 'status_en' => '', 'other' => ''],

            ],
            ['id'],
            ['status_kh', 'status_en', 'other']
        );
    }
}
