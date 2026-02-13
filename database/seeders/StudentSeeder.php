<?php

namespace Database\Seeders;

use App\Models\Student;
use Carbon\Carbon as CarbonAlias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $now = CarbonAlias::now();

        DB::table('students')->upsert(
            [
                [
                    'student_code' => 'STU-0001',
                    'name_kh' => 'សុខ ដារ៉ា',
                    'name_en' => 'Sok Dara',
                    'gender' => 'male',
                    'dob' => '2010-05-12',
                    'address' => 'Phnom Penh',

                    'phone' => '012345678',
                    'email' => 'dara@example.com',
                    'from_school' => 'ABC Primary School',
                    'father_name' => 'Sok Chan',
                    'mother_name' => 'Kim Ly',
                    'guardian_phone' => '098765432',

                    'status_id' => 1,
                    'role_id' => 1, 
                    'other' => null,

                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'student_code' => 'STU-0002',
                    'name_kh' => 'លី សុខា',
                    'name_en' => 'Ly Sokha',
                    'gender' => 'female',
                    'dob' => '2011-08-20',
                    'address' => 'Kandal',

                    'phone' => null,
                    'email' => null,
                    'from_school' => null,
                    'father_name' => null,
                    'mother_name' => null,
                    'guardian_phone' => null,

                    'status_id' => 1,
                    'role_id' => 1,
                    'other' => null,

                    'created_at' => $now,
                    'updated_at' => $now,
                ],
            ],
            ['student_code'], // unique key
            [
                'name_kh',
                'name_en',
                'gender',
                'dob',
                'address',
                'phone',
                'email',
                'from_school',
                'father_name',
                'mother_name',
                'guardian_phone',
                'status_id',
                'role_id',
                'other',
                'updated_at',
            ]
        );  
    }
}
