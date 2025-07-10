<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Reservation\ReservationSeeder;
use Database\Seeders\Reservation\ReservationStatusSeeder;
use Database\Seeders\Table\TableSeeder;
use Database\Seeders\User\UserAdminSeeder;
use Database\Seeders\User\UserSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /** Users Seeding */
        $this->call(UserAdminSeeder::class);
        $this->call(UserSeeder::class);

        /** Tables Seeding */
        $this->call(TableSeeder::class);

        /** Reservations seeding */
        $this->call(ReservationStatusSeeder::class);
        $this->call(ReservationSeeder::class);
    }
}
