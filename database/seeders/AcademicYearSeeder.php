<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AcademicYear::upsert(
            [
                [
                    'id' => '1', 
                    'name' => '2025-2026',
                    'start_date' => '2025-01-01',
                    'end_date' => '2026-01-01',
                    'note' => 'None',
                ],
                [
                    'id' => '2', 
                    'name' => '2026-2027',
                    'start_date' => '2026-01-01',
                    'end_date' => '2027-01-01',
                    'note' => 'None',
                ],
            ],
            ['id'],
            ['name', 'start_date', 'end_date', 'note']
        );
    }
}
