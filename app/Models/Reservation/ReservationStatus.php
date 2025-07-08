<?php

namespace App\Models\Reservation;

use Illuminate\Database\Eloquent\Model;

class ReservationStatus extends Model
{
    protected $fillable = [
        "name",
        "color_hex",
        "bg_color_hex",
    ];
}
