<?php

namespace Database\Seeders;

use App\Models\TournamentFish;
use Illuminate\Database\Seeder;

class TournamentFishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            [
                'tournament_id' => 1,
                'fish_id' => 1,
            ],
            [
                'tournament_id' => 1,
                'fish_id' => 2,
            ],
            [
                'tournament_id' => 1,
                'fish_id' => 3,
            ],
            [
                'tournament_id' => 1,
                'fish_id' => 4,
            ],
        ];

        foreach ($array as $data) {
            TournamentFish::create([
                'tournament_id' => $data['tournament_id'],
                'fish_id' => $data['fish_id'],
            ]);
        }
    }
}
