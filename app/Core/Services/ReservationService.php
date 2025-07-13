<?php

namespace App\Core\Services;

use App\Models\Reservation\Reservation;
use App\Models\User;
use Carbon\Carbon;

/**
* Service for reservation operations
*/
class ReservationService extends BaseEntityService
{
    protected ?string $model = Reservation::class;

    /**
    * Find reservations by user
    */
    public function findByUser(User $user)
    {
        return Reservation::where('user_id', $user->id)->get();
    }

    /**
    * Find reservations by date
    */
    public function findByDate(string $date)
    {
        return Reservation::where('date', $date)->get();
    }

    /**
    * Find reservations by table
    */
    public function findByTable(int $tableId)
    {
        return Reservation::where('table_id', $tableId)->get();
    }

    /**
    * Find today reservations
    */
    public function findTodayReservations()
    {
        return Reservation::where('date', Carbon::today()->format('Y-m-d'))->get();
    }

    /**
    * Find reservations for specific date range
    */
    public function findByDateRange(string $startDate, string $endDate)
    {
        return Reservation::whereBetween('date', [$startDate, $endDate])->get();
    }

    /**
    * Find active reservations (not cancelled)
    */
    public function findActiveReservations()
    {
        return Reservation::whereHas('reservation_status', function ($query) {
            $query->where('name', '!=', 'cancelled');
        })->get();
    }

    /**
    * Find reservations by status
    */
    public function findByStatus(string $statusName)
    {
        return Reservation::whereHas('reservation_status', function ($query) use ($statusName) {
            $query->where('name', $statusName);
        })->get();
    }
} 