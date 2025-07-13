<?php

namespace App\Http\Controllers;

use App\Core\Services\ReservationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display the user profile form.
     */
    public function index(Request $request): View
    {
        /* Load user reservations with related data using service */
        $reservationService = app(ReservationService::class);
        $reservations = $reservationService->findByUser($request->user())
            ->load(['reservation_status', 'table'])
            ->sortByDesc('date')
            ->sortByDesc('time');

        return view('profile.my-reservations', [
            'user' => $request->user(),
            'reservations' => $reservations,
        ]);
    }
}
