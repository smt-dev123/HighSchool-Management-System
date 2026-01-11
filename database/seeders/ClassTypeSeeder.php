<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table(table: 'class_types')->upsert(
            [
                ['id' => 1, 'name' => 'ថ្នាក់ធម្មតា', 'note' => 'សម្រាប់កម្រិតបឋម និងអនុវិទ្យាល័យ'],
                ['id' => 2, 'name' => 'ថ្នាក់វិទ្យាសាស្រ្ដពិត', 'note' => 'សម្រាប់កម្រិវិទ្យាល័យ'],
                ['id' => 3, 'name' => 'ថ្នាក់វិទ្យាសាស្រ្ដសង្គម', 'note' => 'សម្រាប់កម្រិវិទ្យាល័យ'],
            ],
            ['id'],
            ['name', 'note']
        );
    }
}
