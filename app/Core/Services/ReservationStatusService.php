<?php

namespace App\Core\Services;

use App\Models\Reservation\ReservationStatus;

/**
* Service for reservation status operations
*/
class ReservationStatusService extends BaseEntityService
{
    protected ?string $model = ReservationStatus::class;

    /**
    * Find status by name
    */
    public function findByName(string $name): ?ReservationStatus
    {
        return ReservationStatus::where('name', $name)->first();
    }

    /**
    * Find status by code
    */
    public function findByCode(string $code): ?ReservationStatus
    {
        return ReservationStatus::where('code', $code)->first();
    }

    /**
    * Find active statuses (excluding cancelled)
    */
    public function findActiveStatuses()
    {
        return ReservationStatus::where('code', '!=', 'cancelled')->get();
    }

    /**
    * Get default status (usually pending)
    */
    public function getDefaultStatus(): ?ReservationStatus
    {
        return ReservationStatus::where('code', 'pending')->first();
    }

    /**
    * Get confirmed status
    */
    public function getConfirmedStatus(): ?ReservationStatus
    {
        return ReservationStatus::where('code', 'confirmed')->first();
    }

    /**
    * Get cancelled status
    */
    public function getCancelledStatus(): ?ReservationStatus
    {
        return ReservationStatus::where('code', 'cancelled')->first();
    }

    /**
    * Get reserved status
    */
    public function getReservedStatus(): ?ReservationStatus
    {
        return ReservationStatus::where('code', 'reserved')->first();
    }
} 