<?php

namespace App\Filament\Widgets\Reservations;

use App\Core\Services\ReservationService;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TodayReservationsWidget extends BaseWidget
{
    protected static ?int $sort = 0;

    protected string|int|array $columnSpan = 'full';

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
        $reservationService = app(ReservationService::class);
        $todayReservations = $reservationService->findTodayReservations()->count();

        return [
            Stat::make('Dnešné rezervácie', $todayReservations)
                ->description('Počet rezervácií na dnešný deň')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
        ];
    }
}
