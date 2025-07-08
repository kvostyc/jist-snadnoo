<?php

namespace Database\Seeders\Reservation;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reservation_statuses')->insert([
            [
                'name' => 'Dostupný',
                'code' => 'available',
                'color_hex' => '#22c55e',
                'bg_color_hex' => '#15803d',
            ],
            [
                'name' => 'Vybraný',
                'code' => 'selected',
                'color_hex' => '#f59e0b',
                'bg_color_hex' => '#b45309',
            ],
            [
                'name' => 'Rezervovaný',
                'code' => 'reserved',
                'color_hex' => '#eab308',
                'bg_color_hex' => '#a16207',
            ],
            [
                'name' => 'Obsadený',
                'code' => 'occupied',
                'color_hex' => '#ef4444',
                'bg_color_hex' => '#b91c1c',
            ],
            [
                'name' => 'Málo miest',
                'code' => 'few_seats',
                'color_hex' => '#a3a3a3',
                'bg_color_hex' => '#525252',
            ],
        ]);
    }
}
