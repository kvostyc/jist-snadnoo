<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as PagesDashboard;
use App\Filament\Widgets\Reservations\ReservationsChartWidget;
use App\Filament\Widgets\Reservations\LastWeekReservationsWidget;
use App\Filament\Widgets\Reservations\TodayReservationsWidget;

class Dashboard extends PagesDashboard
{
    protected function getHeaderWidgets(): array
    {
        return [
            TodayReservationsWidget::class,
            LastWeekReservationsWidget::class,
        ];
    }

    public function getColumns(): int | string | array
    {
        return 1;
    }

    protected function getFooterWidgets(): array
    {
        return [];
    }

    public function getWidgets(): array
    {
        return [
            ReservationsChartWidget::class,
        ];
    }
}
