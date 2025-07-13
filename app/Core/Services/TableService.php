<?php

namespace App\Core\Services;

use App\Models\Table\Table;

/**
* Service for table operations
*/
class TableService extends BaseEntityService
{
    protected ?string $model = Table::class;

    /**
    * Find tables by type
    */
    public function findByType(string $type)
    {
        return Table::where('type', $type)->get();
    }

    /**
    * Find available tables for guest count
    */
    public function findAvailableForGuestCount(int $guestCount)
    {
        return Table::where('available_for_guest_count', '>=', $guestCount)->get();
    }

    /**
    * Find tables by identifier
    */
    public function findByIdentifier(string $identifier): ?Table
    {
        return Table::where('identifier', $identifier)->first();
    }

    /**
    * Find tables with reservations for specific date
    */
    public function findWithReservationsForDate(string $date)
    {
        return Table::with(['reservations' => function ($query) use ($date) {
            $query->where('date', $date);
        }])->get();
    }

    /**
    * Find available tables for specific date and time
    */
    public function findAvailableForDateTime(string $date, string $time)
    {
        return Table::whereDoesntHave('reservations', function ($query) use ($date, $time) {
            $query->where('date', $date)
                  ->where('time', $time);
        })->get();
    }
} 