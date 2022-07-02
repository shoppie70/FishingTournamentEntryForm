<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminsTableSeeder::class);
        $this->call(FishTableSeeder::class);
        $this->call(TournamentTableSeeder::class);
        $this->call(TournamentFishTableSeeder::class);
    }
}
