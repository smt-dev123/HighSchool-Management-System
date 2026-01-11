<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table(table: 'student_groups')->upsert(
            [
                ['id' => 1, 'name' => 'ក្រុមទី១', 'description' => 'សិស្សានុសិស្ស'],
                ['id' => 2, 'name' => 'ក្រុមទី២', 'description' => 'សិស្សានុសិស្ស'],
                ['id' => 3, 'name' => 'ក្រុមទី៣', 'description' => 'សិស្សានុសិស្ស'],
                ['id' => 4, 'name' => 'ក្រុមទី៤', 'description' => 'សិស្សានុសិស្ស'],
                ['id' => 5, 'name' => 'ក្រុមទី៥', 'description' => 'សិស្សានុសិស្ស'],
            ],
            ['id'],
            ['name', 'description']
        );
    }
}
