<?php

namespace App\Models\Reservation;

use Database\Factories\Reservation\ReservationStatusFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "color_hex",
        "bg_color_hex",
    ];
}
