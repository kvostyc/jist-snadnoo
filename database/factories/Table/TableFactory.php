<?php

namespace Database\Factories\Table;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Table\Table>
 */
class TableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word() . ' ' . $this->faker->randomElement(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']),
            'identifier' => strtoupper($this->faker->bothify('TBL-##??')),
            'available_for_guest_count' => $this->faker->numberBetween(1, 8),
        ];
    }
}
