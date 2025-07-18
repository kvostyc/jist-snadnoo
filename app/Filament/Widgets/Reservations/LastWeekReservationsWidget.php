<?php

namespace App\Filament\Widgets\Reservations;

use App\Core\Services\ReservationService;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LastWeekReservationsWidget extends BaseWidget
{
    protected static ?int $sort = 0;

    public function getColumnSpan(): int|string|array
    {
        return 'lg'; 
    }

    protected function getColumns(): int
    {
        return 1;
    }

    protected function getStats(): array
    {
        $lastWeekStart = now()->subDays(7)->startOfDay()->format('Y-m-d');
        $lastWeekEnd = now()->endOfDay()->format('Y-m-d');

        $reservationService = app(ReservationService::class);
        $lastWeekReservations = $reservationService->findByDateRange($lastWeekStart, $lastWeekEnd)->count();

        return [
            Stat::make('Rezervácie za posledných 7 dní', $lastWeekReservations)
                ->description('Počet nových rezervácií za posledný týždeň')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('info')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
        ];
    }
}
