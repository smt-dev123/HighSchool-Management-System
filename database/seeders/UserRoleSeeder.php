<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table(table: 'user_roles')->upsert(
            [
                ['name' => 'superAdmin'],
                ['name' => 'admin'],
                ['name' => 'teacher'],
                ['name' => 'student'],
            ],
            ['id'],
            ['name']
        );
    }
}
