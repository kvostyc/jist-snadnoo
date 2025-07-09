<?php

namespace App\Livewire\Reservation;

use App\Livewire\Reservation\Traits\HasReservationAttributes;
use Livewire\Component;

class ReservationForm extends Component
{
    use HasReservationAttributes;

    public $step = 1;

    public function mount() {}

    public function render()
    {
        return view('livewire.reservation.reservation-form');
    }

    public function submitReservationTimes()
    {
        $this->validate([
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'],
            'guest_count' => ['required', 'integer', 'min:1', 'max:' . $this->max_guest_count],
        ], [
            'date.required' => 'Dátum je povinný.',
            'date.date' => 'Dátum musí byť v správnom formáte.',
            'time.required' => 'Čas je povinný.',
            'time.date_format' => 'Čas musí byť vo formáte HH:MM.',
            'guest_count.required' => 'Počet hostí je povinný.',
            'guest_count.integer' => 'Počet hostí musí byť číslo.',
            'guest_count.min' => 'Minimálny počet hostí je 1.',
            'guest_count.max' => 'Maximálny počet hostí je ' . $this->max_guest_count . '.',
        ]);

        $this->step = 2;
    }
}
