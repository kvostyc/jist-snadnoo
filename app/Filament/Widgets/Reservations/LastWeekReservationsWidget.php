<?php

namespace App\Filament\Widgets\Reservations;

use App\Models\Reservation\Reservation;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LastWeekReservationsWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        $lastWeekStart = now()->subDays(7)->startOfDay();
        $lastWeekEnd = now()->endOfDay();

        $lastWeekReservations = Reservation::whereBetween('created_at', [$lastWeekStart, $lastWeekEnd])->count();

        return [
            Stat::make('Rezervácie za posledných 7 dní', $lastWeekReservations)
                ->description('Počet nových rezervácií za posledný týždeň')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('info')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
        ];
    }
}
