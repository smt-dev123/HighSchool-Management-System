<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table(table: 'student_roles')->upsert(
            [
                ['id' => 1, 'name' => 'ប្រធានថ្នាក់', 'note' => 'អ្នកដឹកនាំថ្នាក់សិក្សា'],
                ['id' => 2, 'name' => 'អនុប្រធាន១', 'note' => 'អ្នកដឹកនាំថ្នាក់សិក្សា១'],
                ['id' => 3, 'name' => 'អនុប្រធាន២', 'note' => 'អ្នកដឹកនាំថ្នាក់សិក្សា២'],
                ['id' => 4, 'name' => 'សិស្សានុសិស្ស', 'note' => 'សិស្សានុសិស្ស'],
                ['id' => 5, 'name' => 'ក្រុមប្រឹក្សាកុមារ', 'note' => 'អ្នកដឹកនាំក្រុមប្រឹក្សាកុមារ'],
            ],
            ['id'],
            ['name', 'note']
        );
    }
}
