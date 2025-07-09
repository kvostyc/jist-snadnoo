<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display the user profile form.
     */
    public function index(Request $request): View
    {
        /* Load user reservations with related data in a single query */
        $reservations = $request->user()->reservations()
            ->with(['reservation_status', 'table'])
            ->orderBy('date', 'desc')
            ->orderBy('time', 'desc')
            ->get();

        return view('profile.my-reservations', [
            'user' => $request->user(),
            'reservations' => $reservations,
        ]);
    }
}
