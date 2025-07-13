<?php

namespace App\Providers;

use App\Core\Services\Interfaces\BaseEntityServiceInterface;
use App\Core\Services\ReservationService;
use App\Core\Services\ReservationStatusService;
use App\Core\Services\TableService;
use App\Core\Services\UserService;
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
        /** 
         * Register services 
         */
        $this->app->bind(UserService::class);
        $this->app->bind(ReservationService::class);
        $this->app->bind(TableService::class);
        $this->app->bind(ReservationStatusService::class);
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
