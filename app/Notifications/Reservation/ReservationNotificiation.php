<?php

namespace App\Notifications\Reservation;

use App\Notifications\BaseNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationNotificiation extends BaseNotification
{
    protected function getIcon(): string
    {
        /** @TODO add Blade icons component support */
        return '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 7.756a4.5 4.5 0 1 0 0 8.488M7.5 10.5h5.25m-5.25 3h5.25M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                ';
    }

    protected function getLink(): string
    {
        return $this->typeOfRecord != 'deleted' ? '/admin/reservations/' . $this->data->id . '/edit' : '#';
    }

    protected function getMessage(): string
    {
        return 'rezervácia';
    }
}
