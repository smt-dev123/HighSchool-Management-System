<?php

namespace Database\Seeders;

use App\Models\AttendanceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attendance_types')->upsert(
            [
                ['id' => 1, 'name' => 'P', 'note' => 'Student is present'],
                ['id' => 2, 'name' => 'A', 'note' => 'Student is absent'],
                ['id' => 3, 'name' => 'AL', 'note' => 'Student is absent with leave'],
            ],
            ['id'],
            ['name', 'note']
        );
    }
}
