<?php

namespace Database\Seeders;

use App\Models\ReservationPlace;
use Illuminate\Database\Seeder;

class ReservationPlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReservationPlace::create(
            [
                'name' => '3階職員食堂',
            ],
            [
                'name' => 'ケアセンター',
            ],
        );
    }
}
