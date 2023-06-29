<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Tables\ReservationTable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(ReservationTable $reservationTable): View
    {
        return view('bewama::pages.dashboard.reservation.index', compact('reservationTable'));
    }

    public function create()
    {
        return view('bewama::pages.dashboard.reservation.show');
    }

    public function store(Request $request)
    {
    }

    public function show(Reservation $reservation)
    {
        return view('bewama::pages.dashboard.reservation.show', compact('reservation'));
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
    }


    public function destroy(string $id)
    {
    }
}
