<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            ['name_kh' => 'គណិតវិទ្យា', 'name_en' => 'Mathematics'],
            ['name_kh' => 'ភាសាខ្មែរ', 'name_en' => 'Khmer Language'],
            ['name_kh' => 'រូបវិទ្យា', 'name_en' => 'Physics']
        ];
        foreach ($subjects as $s) \App\Models\Subject::create($s);
    }
}
