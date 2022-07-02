<?php

namespace Database\Seeders;

use App\Models\Tournament;
use Illuminate\Database\Seeder;

class TournamentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tournament::create([
            'name' => '前田杯 秋の磯釣り大会',
            'image_path' => '',
            'date' => '2022-09-24',
            'capacity' => 30,
            'last_entry_number' => 0,
        ]);
    }
}
