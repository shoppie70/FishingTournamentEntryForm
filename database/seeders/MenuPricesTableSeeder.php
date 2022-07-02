<?php

namespace Database\Seeders;

use App\Models\MenuPrice;
use Illuminate\Database\Seeder;

class MenuPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuPrice::create(
            [
                'price' => 500,
            ],
        );
    }
}
