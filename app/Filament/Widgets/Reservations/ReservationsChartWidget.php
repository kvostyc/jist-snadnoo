<?php

namespace App\Filament\Widgets\Reservations;

use App\Core\Services\ReservationService;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReservationsChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Rezervácie za posledné obdobie';
    
    protected static ?int $sort = 0;

    protected string|int|array $columnSpan = 'full';
    
    public ?string $filter = '7';
    
    protected function getFilters(): ?array
    {
        return [
            '7' => 'Posledných 7 dní',
            '14' => 'Posledných 14 dní', 
            '28' => 'Posledných 28 dní',
            '31' => 'Posledných 31 dní',
        ];
    }
    
    protected function getData(): array
    {
        $days = (int) $this->filter;
        $startDate = now()->subDays($days - 1)->startOfDay();
        $endDate = now();
        
        $reservationService = app(ReservationService::class);
        $reservations = $reservationService->findByDateRange(
            $startDate->format('Y-m-d'),
            $endDate->format('Y-m-d')
        );
        
        // Group reservations by date and count them
        $reservationsByDate = $reservations->groupBy('date')->map->count();
        
        $dates = [];
        $counts = [];
        
        for ($i = 0; $i < $days; $i++) {
            $date = $startDate->copy()->addDays($i)->format('Y-m-d');
            $dates[] = Carbon::parse($date)->format('d.m');
            
            $count = $reservationsByDate->get($date, 0);
            $counts[] = $count;
        }
        
        return [
            'datasets' => [
                [
                    'label' => 'Počet rezervácií',
                    'data' => $counts,
                    'backgroundColor' => '#f97316',
                    'borderColor' => '#ea580c',
                    'borderWidth' => 2,
                ],
            ],
            'labels' => $dates,
        ];
    }
    
    protected function getType(): string
    {
        return 'bar';
    }
}