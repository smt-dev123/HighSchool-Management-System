<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sturole = [
            ['name' => 'ក្រុមប្រឹក្សាកុមារ'],
            ['name' => 'ប្រធានថ្នាក់'],
            ['name' => 'សិស្សធម្មតា'],
        ];

        foreach ($sturole as $r) {
            \App\Models\StudentStatus::create($r);
        }
    }
}
