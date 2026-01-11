<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table(table: 'teacher_roles')->upsert(
            [
                ['id' => 1, 'name' => 'គ្រូបន្ទុកថ្នាក់', 'note' => 'គ្រូបន្ទុកថ្នាក់'],
                ['id' => 2, 'name' => 'គ្រូបន្ទុកបង្រៀន', 'note' => 'គ្រូបន្ទុកបង្រៀន'],
                ['id' => 3, 'name' => 'គ្រូផ្នែករដ្ឋបាល',  'note' => 'គ្រូផ្នែករដ្ឋបាល'],
            ],
            ['id'],
            ['name', 'note']
        );
    }
}
