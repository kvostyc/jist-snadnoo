<?php

namespace Database\Seeders\Reservation;

use App\Models\Reservation\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Create reservations without firing model observers/events
         * This ensures that no Reservation observer logic is triggered during seeding
         */
        Reservation::withoutEvents(function () {
            Reservation::factory(50)->create();
        });
    }
}
