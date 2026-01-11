<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeekDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table(table: 'week_days')->upsert(
            [
                ['name_kh' => 'ច័ន្ទ', 'name_en' => 'Monday'],
                ['name_kh' => 'អង្គារ', 'name_en' => 'Tuesday'],
                ['name_kh' => 'ពុធ', 'name_en' => 'Wednesday'],
                ['name_kh' => 'ព្រហស្បតិ៍', 'name_en' => 'Thursday'],
                ['name_kh' => 'សុក្រ', 'name_en' => 'Friday'],
                ['name_kh' => 'សៅរ៍', 'name_en' => 'Saturday'],
                ['name_kh' => 'អាទិត្យ', 'name_en' => 'Sunday']
            ],
            ['id'],
            ['name_kh', 'name_en']
        );
    }
}
