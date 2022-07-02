<?php

namespace Database\Seeders;

use App\Models\Fish;
use Illuminate\Database\Seeder;

class FishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            '真鯛',
            '黒鯛',
            '青物',
            'アコウ'
        ];

        foreach ($array as $name) {
            Fish::create([
                'name' => $name
            ]);
        }
    }
}
