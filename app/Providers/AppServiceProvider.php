<?php

namespace App\Providers;

use App\Models\Reservation\Reservation;
use App\Observers\Reservation\ReservationObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         * Observer for Reservations
         * to catch creating of Entity for Notifications
         */
        Reservation::observe(ReservationObserver::class);
    }
}
