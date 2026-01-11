<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table(table: 'grade_levels')->upsert(
            [
                ['id' => 1, 'name' => 'ថ្នាក់ទី៧', 'note' => 'ថ្នាក់មធ្យមសិក្សា បឋមភូមិ'],
                ['id' => 2, 'name' => 'ថ្នាក់ទី៨', 'note' => 'ថ្នាក់មធ្យមសិក្សា បឋមភូមិ'],
                ['id' => 3, 'name' => 'ថ្នាក់ទី៩', 'note' => 'ថ្នាក់មធ្យមសិក្សា បឋមភូមិ'],
                ['id' => 4, 'name' => 'ថ្នាក់ទី១០', 'note' => 'មធ្យមសិក្សា ទុតិយភូមិ'],
                ['id' => 5, 'name' => 'ថ្នាក់ទី១១', 'note' => 'មធ្យមសិក្សា ទុតិយភូមិ'],
                ['id' => 6, 'name' => 'ថ្នាក់ទី១២', 'note' => 'មធ្យមសិក្សា ទុតិយភូមិ'],
            ],
            ['id'],
            ['name', 'note']
        );
    }
}
