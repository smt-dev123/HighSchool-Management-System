<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table(table: 'users')->upsert(
            [
                ['user_role_id' => 1, 'name' => 'SMT', 'phone' => '0123456789', 'email' => 'smt@gmail.com', 'password' => bcrypt('12345678')],
            ],
            ['id'],
            ['name', 'phone', 'email', 'password', 'user_role_id']
        );
    }
}
