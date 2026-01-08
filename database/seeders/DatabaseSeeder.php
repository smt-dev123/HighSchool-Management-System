<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            // ១. ក្រុមឯករាជ្យ (Lookup Tables)
            StudentRoleSeeder::class,
            StudentStatusSeeder::class,
            TeacherStatusSeeder::class,
            TeacherRoleSeeder::class,
            GradeLevelSeeder::class,
            ClassTypeSeeder::class,
            AcademicYearSeeder::class,
            SubjectSeeder::class,
            WeekDaySeeder::class,
            TimeSeeder::class,
            ScoreTypeSeeder::class,
            AttendanceTypeSeeder::class,
            RoleSeeder::class, // User Roles

            // ២. ក្រុមទិន្នន័យគោល (Master Data)
            StudentSeeder::class,
            TeacherSeeder::class,
            // UserSeeder::class,

            // ៣. ក្រុមទំនាក់ទំនង (Relational Data)
            SubjectGradeLevelSeeder::class,
            ClassesSeeder::class,

            // ៤. ក្រុមប្រតិបត្តិការ (Transactional Data)
            StudentClassSeeder::class,
            TeacherClassSeeder::class,
            ScoreSeeder::class,
            ScheduleSeeder::class,
            AttendanceSeeder::class,
        ]);
    }
}
