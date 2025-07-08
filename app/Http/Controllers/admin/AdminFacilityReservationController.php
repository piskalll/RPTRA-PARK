<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FacilityReservation;

class AdminFacilityReservationController extends Controller
{
    public function index()
    {
        $reservations = FacilityReservation::with('facility')->latest()->paginate(10);
        return view('admin.reservations.index', compact('reservations'));
    }

    public function show(FacilityReservation $reservation)
    {
        return view('admin.reservations.show', compact('reservation'));
    }

    public function destroy(FacilityReservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('admin.reservations.index')->with('success', 'Pemesanan dihapus.');
    }
}