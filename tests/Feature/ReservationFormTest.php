<?php

namespace Tests\Feature;

use App\Livewire\Reservation\ReservationForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ReservationFormTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_shows_reservation_form()
    {
        Livewire::test(ReservationForm::class)
            ->assertStatus(200)
            ->assertSee('Rezervácia stola');
    }

    #[Test]
    public function it_validates_required_fields()
    {
        Livewire::test(ReservationForm::class)
            ->set('date', '')
            ->set('time', '')
            ->set('guest_count', null)
            ->call('submitReservationTimes')
            ->assertHasErrors(['date', 'time', 'guest_count']);
    }

    #[Test]
    public function it_moves_to_step_2_on_valid_input()
    {
        Livewire::test(ReservationForm::class)
            ->set('date', now()->toDateString())
            ->set('time', '12:00')
            ->set('guest_count', 2)
            ->call('submitReservationTimes')
            ->assertSet('step', 2);
    }
}
