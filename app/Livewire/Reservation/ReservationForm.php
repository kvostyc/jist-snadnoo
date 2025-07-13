<?php

namespace App\Livewire\Reservation;

use App\Livewire\Reservation\Traits\HasReservationAttributes;
use Livewire\Component;

/**
* Livewire component for reservation form
*/
class ReservationForm extends Component
{
    use HasReservationAttributes;

    public $step = 1;

    /**
    * Initialize component properties
    */
    public function mount() 
    {
        $this->date = $this->date ?: '';
        $this->time = $this->time ?: '';
        $this->guest_count = $this->guest_count ?: null;
    }

    /**
    * Render the component
    */
    public function render()
    {
        return view('livewire.reservation.reservation-form');
    }

    /**
    * Submit reservation times and validate
    */
    public function submitReservationTimes()
    {
        $this->validate([
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'],
            'guest_count' => ['required', 'integer', 'min:1', 'max:' . $this->max_guest_count],
        ], [
            'date.required' => __('validation.required', ['attribute' => __('validation.attributes.date')]),
            'date.date' => __('validation.date', ['attribute' => __('validation.attributes.date')]),
            'time.required' => __('validation.required', ['attribute' => __('validation.attributes.time')]),
            'time.date_format' => __('validation.date_format', ['attribute' => __('validation.attributes.time'), 'format' => 'HH:MM']),
            'guest_count.required' => __('validation.required', ['attribute' => __('validation.attributes.guest_count')]),
            'guest_count.integer' => __('validation.integer', ['attribute' => __('validation.attributes.guest_count')]),
            'guest_count.min' => __('validation.min.numeric', ['attribute' => __('validation.attributes.guest_count'), 'min' => 1]),
            'guest_count.max' => __('validation.max.numeric', ['attribute' => __('validation.attributes.guest_count'), 'max' => $this->max_guest_count]),
        ]);

        $this->step = 2;
    }
}
