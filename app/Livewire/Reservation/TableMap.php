<?php

namespace App\Livewire\Reservation;

use App\Livewire\Reservation\Traits\HasReservationAttributes;
use Livewire\Component;
use App\Models\Table\Table;
use App\Models\Reservation\ReservationStatus;
use App\Models\Reservation\Reservation;
use Illuminate\Support\Facades\Auth;

class TableMap extends Component
{
    use HasReservationAttributes;

    /* Tables with statuses and attributes */
    public $tables;

    /* Possible reservation statuses */
    public $statuses;

    /* Selected table ID */
    public $selectedTableId = null;

    /* User name */
    public $name;

    /* User email */
    public $email;

    /* User phone */
    public $phone;

    /* Flag to indicate if reservation was successful */
    public $reservationSuccess = false;

    /**
     * Handle table selection by user.
     * Resets any previous validation errors and sets the selected table ID.
     */
    public function selectTable($id)
    {
        /* Delete showed errors */
        $this->resetErrorBag();

        /* Get the table to check if it can be selected */
        $table = Table::find($id);
        
        /* Check if table has enough capacity for the guest count */
        if ($table && $this->guest_count > $table->available_for_guest_count) {
            $this->addError('selectedTableId', __('reservation.error_table_capacity', [
                'capacity' => $table->available_for_guest_count,
                'requested' => $this->guest_count
            ]));
            return;
        }

        $this->selectedTableId = $id;
    }

    /**
     * Handle reservation of the selected table.
     * Validates input, creates reservation, updates state, and dispatches success event.
     */
    public function reserveTable()
    {
        /* Validate that a table is selected and exists */
        $this->validate([
            'selectedTableId' => 'required|exists:tables,id',
        ], [
            'selectedTableId.required' => __('reservation.error_select_table'),
        ]);

        /* Get the 'reserved' status from the database */
        $status = ReservationStatus::where('code', 'reserved')->first();

        /* Create a new reservation record */
        Reservation::create([
            'user_id' => Auth::id(),
            'reservation_status_id' => $status ? $status->id : null,
            'table_id' => $this->selectedTableId,
            'date' => $this->date,
            'time' => $this->time,
            'guest_count' => $this->guest_count,
        ]);

        /* Set success flag and reset selected table */
        $this->reservationSuccess = true;
        $this->selectedTableId = null;

        /* Dispatch a browser event to notify about successful reservation */
        $this->dispatch('reservation-success');
    }

    /**
     * Render the component.
     * Loads tables and their statuses for the selected date and time.
     * Passes selected table and reservation success flag to the view.
     */
    public function render()
    {
        /* Get all reservation statuses, keyed by their code */
        $statuses = ReservationStatus::all()->keyBy('code');

        /* Get all tables and determine their status for the selected date and time */
        $tables = Table::all()->map(function ($table) use ($statuses) {
            /* Find a reservation for this table at the selected date and time with specific statuses */
            $reservation = $table->reservations()
                ->where('date', $this->date)
                ->where('time', $this->time)
                ->whereHas('reservation_status', function ($q) {
                    $q->whereIn('code', ['reserved', 'occupied', 'few_seats']);
                })
                ->first();

            /* Set table status based on reservation, or check capacity for available tables */
            if ($reservation) {
                /* Table already has a reservation - use its status */
                $table->status = $reservation->reservation_status->code;
            } else {
                /* Table is available - check if it has enough capacity */
                if ($this->guest_count > $table->available_for_guest_count) {
                    $table->status = 'few_seats';
                } else {
                    $table->status = 'available';
                }
            }

            $status = $statuses[$table->status] ?? null;
            $table->color_hex = $status->color_hex ?? '#a3a3a3';
            $table->bg_color_hex = $status->bg_color_hex ?? '#525252';
            $table->status_name = $status->name ?? $table->status;

            return $table;
        });

        /* Find the currently selected table object */
        $selectedTable = $tables->firstWhere('id', $this->selectedTableId);

        /* Update component properties */
        $this->tables = $tables;
        $this->statuses = $statuses;

        /* Return the view with relevant data */
        return view('livewire.reservation.table-map', [
            'selectedTable' => $selectedTable,
            'reservationSuccess' => $this->reservationSuccess,
        ]);
    }

    /**
     * Initialize the component with date, time, and guest count.
     * These are used to filter tables and reservations.
     */
    public function mount($date, $time, $guest_count)
    {
        $this->date = $date;
        $this->time = $time;
        $this->guest_count = $guest_count;
    }
}
