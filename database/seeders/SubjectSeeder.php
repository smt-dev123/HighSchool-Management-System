<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table(table: 'subjects')->upsert(
            [
                ['name_kh' => 'គណិតវិទ្យា', 'name_en' => 'Mathematics'],
                ['name_kh' => 'ភាសាខ្មែរ', 'name_en' => 'Khmer Language'],
                ['name_kh' => 'រូបវិទ្យា', 'name_en' => 'Physics']
            ],
            ['id'],
            ['name_kh', 'name_en']
        );
    }
}
