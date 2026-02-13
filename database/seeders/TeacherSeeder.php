<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::upsert([
            [
                'name_kh' => 'គ្រូ អា',
                'name_en' => 'Teacher A',
                'gender' => 'Male',
                'dob' => '1980-01-01',
                'join_date' => '2020-01-01',
                'level' => 'Bachelor',
                'address' => 'Phnom Penh',
                'phone' => '012345678',
                'email' => 'teacher.a@example.com',
                'profile' => null,
                'is_enable_account' => true,
                'status_id' => 1, // ensure this exists in teacher_statuses
                'other' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_kh' => 'គ្រូ ប',
                'name_en' => 'Teacher B',
                'gender' => 'Female',
                'dob' => '1985-05-05',
                'join_date' => '2021-01-01',
                'level' => 'Master',
                'address' => 'Siem Reap',
                'phone' => '098765432',
                'email' => 'teacher.b@example.com',
                'profile' => null,
                'is_enable_account' => true,
                'status_id' => 1,
                'other' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ],
        // Conflict columns (you can choose 'email' if unique)
        ['email'],
        // Columns to update if conflict
        ['name_kh','name_en','gender','dob','join_date','level','address','phone','profile','is_enable_account','status_id','other','updated_at']);
    }
}
