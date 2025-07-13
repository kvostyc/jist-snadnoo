<?php

namespace Database\Factories\Reservation;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation\ReservationStatus>
 */
class ReservationStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Rezervované', 'Obsadené', 'Voľné', 'Zrušené']),
            'code' => $this->faker->unique()->randomElement(['reserved', 'occupied', 'available', 'cancelled']),
            'color_hex' => $this->faker->hexColor(),
            'bg_color_hex' => $this->faker->hexColor(),
        ];
    }
}
