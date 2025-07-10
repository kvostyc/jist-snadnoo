<?php

declare(strict_types=1);

namespace App\Observers\Reservation;

use App\Core\Services\AdminNotificationService;
use App\Models\Reservation\Reservation;
use App\Notifications\Reservation\ReservationNotificiation;

class ReservationObserver
{
    protected AdminNotificationService $notifier;

    public function __construct(AdminNotificationService $notifier)
    {
        $this->notifier = $notifier;
    }

    /**
     * Handle the Reservation "created" event.
     */
    public function created(Reservation $reservation): void
    {
        $this->notifier->notify(new ReservationNotificiation($reservation, 'created'));
    }

    /**
     * Handle the Reservation "updated" event.
     */
    public function updated(Reservation $reservation): void
    {
        $this->notifier->notify(new ReservationNotificiation($reservation, 'updated'));
    }

    /**
     * Handle the Reservation "deleted" event.
     */
    public function deleted(Reservation $reservation): void
    {
        $this->notifier->notify(new ReservationNotificiation($reservation, 'deleted'));
    }
}
