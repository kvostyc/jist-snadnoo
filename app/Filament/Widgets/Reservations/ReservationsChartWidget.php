<?php

namespace App\Filament\Widgets\Reservations;

use App\Models\Reservation\Reservation;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReservationsChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Rezervácie za posledné obdobie';
    
    protected static ?int $sort = 2;

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
        
        $reservations = DB::table('reservations')
            ->whereBetween('date', [
                $startDate->format('Y-m-d'),
                now()->format('Y-m-d')
            ])
            ->selectRaw('date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        
        $dates = [];
        $counts = [];
        
        for ($i = 0; $i < $days; $i++) {
            $date = $startDate->copy()->addDays($i)->format('Y-m-d');
            $dates[] = Carbon::parse($date)->format('d.m');
            
            $count = $reservations->where('date', $date)->first()?->count ?? 0;
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