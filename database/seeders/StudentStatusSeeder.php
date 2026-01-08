<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['status_kh' => 'កំពុងរៀន', 'status_en' => 'Active'],
            ['status_kh' => 'ឈប់រៀន', 'status_en' => 'Dropped'],
            ['status_kh' => 'ព្យួរការសិក្សា', 'status_en' => 'Suspended'],
        ];

        foreach ($statuses as $status) {
            \App\Models\StudentStatus::create($status);
        }
    }
}
