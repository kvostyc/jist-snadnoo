<?php

namespace Database\Factories\Reservation;

use App\Models\Reservation\Reservation;
use App\Models\Reservation\ReservationStatus;
use App\Models\Table\Table;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $guestCount = $this->faker->numberBetween(1, 8);
        
        $table = Table::where('available_for_guest_count', '>=', $guestCount)
            ->inRandomOrder()
            ->first();
            
        $status = ReservationStatus::where('code', 'reserved')->first() ?? ReservationStatus::inRandomOrder()->first();
        
        $user = User::inRandomOrder()->first();
        
        $date = $this->faker->dateTimeBetween('-30 days', 'now')->format('Y-m-d');
        
        $time = $this->faker->randomElement([
            '08:00', '10:00', '12:00', '14:00', '16:00', '18:00', '20:00', '22:00'
        ]);

        return [
            'user_id' => $user?->id ?? User::factory(),
            'reservation_status_id' => $status?->id ?? ReservationStatus::factory(),
            'table_id' => $table?->id ?? Table::factory(),
            'date' => $date,
            'time' => $time,
            'guest_count' => $guestCount,
        ];
    }
}
