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

    public $tables;
    public $statuses;
    public $selectedTableId = null;
    public $name;
    public $email;
    public $phone;
    public $reservationSuccess = false;

    public function selectTable($id)
    {
        $this->selectedTableId = $id;
    }

    public function reserveTable()
    {
        $this->validate([
            'selectedTableId' => 'required|exists:tables,id',
        ], [
            'selectedTableId.required' => __('reservation.error_select_table'),
        ]);

        $status = ReservationStatus::where('code', 'reserved')->first();

        Reservation::create([
            'user_id' => Auth::id(),
            'reservation_status_id' => $status ? $status->id : null,
            'table_id' => $this->selectedTableId,
            'date' => $this->date,
            'time' => $this->time,
            'guest_count' => $this->guest_count,
        ]);

        $this->reservationSuccess = true;
        $this->selectedTableId = null;

        $this->dispatch('reservation-success');
    }

    public function render()
    {
        $statuses = ReservationStatus::all()->keyBy('code');

        $tables = Table::all()->map(function ($table) use ($statuses) {
            $reservation = $table->reservations()
                ->where('date', $this->date)
                ->where('time', $this->time)
                ->whereHas('reservation_status', function ($q) {
                    $q->whereIn('code', ['reserved', 'occupied', 'few_seats']);
                })
                ->first();

            if ($reservation) {
                $table->status = $reservation->reservation_status->code;
            } else {
                $table->status = 'available';
            }

            $status = $statuses[$table->status] ?? null;
            $table->color_hex = $status->color_hex ?? '#a3a3a3';
            $table->bg_color_hex = $status->bg_color_hex ?? '#525252';
            $table->status_name = $status->name ?? $table->status;

            return $table;
        });

        $selectedTable = $tables->firstWhere('id', $this->selectedTableId);

        $this->tables = $tables;

        $this->statuses = $statuses;

        return view('livewire.reservation.table-map', [
            'selectedTable' => $selectedTable,
            'reservationSuccess' => $this->reservationSuccess,
        ]);
    }

    public function mount($date, $time, $guest_count)
    {
        $this->date = $date;
        $this->time = $time;
        $this->guest_count = $guest_count;
    }
}
