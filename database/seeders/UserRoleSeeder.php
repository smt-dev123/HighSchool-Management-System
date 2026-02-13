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
                ['id' => '1', 'name' => 'superAdmin'],
                ['id' => '2', 'name' => 'admin'],
                ['id' => '3', 'name' => 'teacher'],
                ['id' => '4', 'name' => 'student'],
            ],
            ['id'],
            ['name']
        );
    }
}
