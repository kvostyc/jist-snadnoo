<?php

namespace Tests\Feature;

use App\Livewire\Reservation\TableMap;
use App\Models\Table\Table;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class TableMapTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_requires_table_selection()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test(TableMap::class, [
            'date' => now()->toDateString(),
            'time' => '12:00',
            'guest_count' => 2,
        ])
            ->call('reserveTable')
            ->assertHasErrors(['selectedTableId']);
    }

    #[Test]
    public function it_can_select_table_and_reserve()
    {
        $user = User::factory()->create();
        $table = Table::factory()->create([
            'available_for_guest_count' => 4,
            'x' => 100,
            'y' => 100,
            'type' => 'square'
        ]);
        $this->actingAs($user);

        Livewire::test(TableMap::class, [
            'date' => now()->toDateString(),
            'time' => '12:00',
            'guest_count' => 2,
        ])
            ->call('selectTable', $table->id)
            ->assertSet('selectedTableId', $table->id)
            ->call('reserveTable')
            ->assertSet('reservationSuccess', true);
    }
}
