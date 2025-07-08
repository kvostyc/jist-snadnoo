<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Reservation\ReservationStatusSeeder;
use Database\Seeders\Table\TableSeeder;
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
       $this->call(UserSeeder::class);

       $this->call(TableSeeder::class);

       $this->call(ReservationStatusSeeder::class);
    }
}
