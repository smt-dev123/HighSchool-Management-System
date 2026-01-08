<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'student_code' => 'ST001',
                'name_kh' => 'សុខ សំណាង',
                'name_en' => 'Sok Samnang',
                'gender' => 'Male',
                'dob' => '2015-05-20',
                'phone' => '012345678',
                'email' => 'samnang@example.com',
                'address' => 'សៀមរាប',
                'from_school' => 'បឋមសិក្សា រលួស',
                'father_name' => 'សុខ ជា',
                'mother_name' => 'មាស សុខា',
                'guardian_phone' => '011223344',
                'status_id' => 1,
                'role_id' => 1,
            ],
            [
                'student_code' => 'ST002',
                'name_kh' => 'ចាន់ ស្រីមុំ',
                'name_en' => 'Chan Sreymom',
                'gender' => 'Female',
                'dob' => '2015-08-15',
                'phone' => '098765432',
                'email' => 'sreymom@example.com',
                'address' => 'សៀមរាប',
                'from_school' => 'បឋមសិក្សា រលួស',
                'father_name' => 'ចាន់ តុលា',
                'mother_name' => 'គឹម ហុង',
                'guardian_phone' => '099887766',
                'status_id' => 1,
                'role_id' => 1,
            ],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
