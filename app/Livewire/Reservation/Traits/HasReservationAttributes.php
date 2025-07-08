<?php

namespace App\Livewire\Reservation\Traits;

trait HasReservationAttributes
{
    public $max_guest_count = 8;

    public $date;

    public $time;

    public $guest_count;
}
