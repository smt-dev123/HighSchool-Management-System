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
            // Lookup Tables
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
            UserRoleSeeder::class,

            // Master Data
            StudentSeeder::class,
            TeacherSeeder::class,
            UserSeeder::class,

            // Relational Data
            SubjectGradeLevelSeeder::class,
            ClassesSeeder::class,

            // Transactional Data
            StudentClassSeeder::class,
            TeacherClassSeeder::class,
            ScoreSeeder::class,
            ScheduleSeeder::class,
            AttendanceSeeder::class,
        ]);
    }
}
