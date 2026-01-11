<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoreTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table(table: 'score_types')->upsert(
            [
                ['id' => 1, 'name' => 'ប្រឡងប្រចាំខែមករា', 'date' => '2024-01-31'],
                ['id' => 2, 'name' => 'ប្រឡងប្រចាំខែកុម្ភៈ', 'date' => '2024-02-28'],
                ['id' => 3, 'name' => 'ប្រឡងប្រចាំខែមីនា', 'date' => '2024-03-31'],
                ['id' => 4, 'name' => 'ប្រឡងប្រចាំខែមេសា', 'date' => '2024-04-30'],
                ['id' => 5, 'name' => 'ប្រឡងប្រចាំខែឧសភា', 'date' => '2024-05-31'],
                ['id' => 6, 'name' => 'ប្រឡងប្រចាំខែមិថុនា', 'date' => '2024-06-30'],
                ['id' => 7, 'name' => 'ប្រឡងប្រចាំខែកក្កដា', 'date' => '2024-07-31'],
                ['id' => 8, 'name' => 'ប្រឡងប្រចាំខែសីហា', 'date' => '2024-08-31'],
                ['id' => 9, 'name' => 'ប្រឡងប្រចាំខែកញ្ញា', 'date' => '2024-09-30'],
                ['id' => 10, 'name' => 'ប្រឡងប្រចាំខែតុលា', 'date' => '2024-10-31'],
                ['id' => 11, 'name' => 'ប្រឡងប្រចាំខែវិច្ឆិកា', 'date' => '2024-11-30'],
                ['id' => 12, 'name' => 'ប្រឡងប្រចាំខែធ្នូ', 'date' => '2024-12-31'],
                ['id' => 13, 'name' => 'ប្រឡងប្រចាំឆមាសទី១', 'date' => '2024-3-31'],
                ['id' => 14, 'name' => 'ប្រឡងប្រចាំឆមាសទី២', 'date' => '2024-7-31'],
            ],
            ['id'],
            ['name', 'date']
        );
    }
}
