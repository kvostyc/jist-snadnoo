<?php

namespace App\Models\Reservation;

use App\Models\User;
use App\Models\Table\Table;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        "user_id",
        "reservation_status_id",
        "table_id",
        "time",
        "date",
        "guest_count",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function reservation_status()
    {
        return $this->belongsTo(ReservationStatus::class, "reservation_status_id");
    }

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id');
    }
}
