<?php

namespace App\Models\Table;

use App\Models\Reservation\Reservation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "name",
        "identifier",
        "available_for_guest_count",
        "x",
        "y",
        "type",
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'table_id');
    }
}
