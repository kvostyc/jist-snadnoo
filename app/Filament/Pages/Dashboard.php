<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\AdminNotificationWidget;
use Filament\Pages\Dashboard as PagesDashboard;
use App\Filament\Widgets\Reservations\ReservationsChartWidget;
use App\Filament\Widgets\Reservations\LastWeekReservationsWidget;
use App\Filament\Widgets\Reservations\TodayReservationsWidget;

class Dashboard extends PagesDashboard
{
    protected function getHeaderWidgets(): array
    {
        return [
            AdminNotificationWidget::class,
            TodayReservationsWidget::class,
            LastWeekReservationsWidget::class,
        ];
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
