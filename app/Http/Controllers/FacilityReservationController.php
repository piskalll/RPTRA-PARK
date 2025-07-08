<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\FacilityReservation;
use Illuminate\Http\Request;

class FacilityReservationController extends Controller
{
    public function create(Facility $facility)
    {
        return view('public.reservations.create', compact('facility'));
    }

    public function store(Request $request, Facility $facility)
    {
        $request->validate([
            'name'             => 'required|string|max:100',
            'instance'         => 'nullable|string|max:255',
            'address'          => 'nullable|string|max:255',
            'email'            => 'nullable|email',
            'phone'            => 'nullable|string|max:20',
            'reservation_date' => 'required|date|after_or_equal:today',
            'number_of_people' => 'required|integer|min:1',
            'status'           => 'nullable|string|in:pending,confirmed,cancelled',
            'hour_start'       => 'nullable|date_format:Y-m-d\TH:i',
            'hour_end'         => 'nullable|date_format:Y-m-d\TH:i|after:hour_start',
            'indoor_outdoor'   => 'nullable|string|in:indoor,outdoor',
            'notes'            => 'nullable|string',
        ]);

        $hourStart = $request->hour_start ? date('Y-m-d H:i:s', strtotime($request->hour_start)) : null;
        $hourEnd   = $request->hour_end ? date('Y-m-d H:i:s', strtotime($request->hour_end)) : null;

        $reservation = FacilityReservation::create([
            'facility_id'      => $facility->id,
            'name'             => $request->name,
            'instance'         => $request->instance,
            'address'          => $request->address,
            'email'            => $request->email,
            'phone'            => $request->phone,
            'reservation_date' => $request->reservation_date,
            'number_of_people' => $request->number_of_people,
            'status'           => $request->status ?? 'pending',
            'hour_start'       => $hourStart,
            'hour_end'         => $hourEnd,
            'indoor_outdoor'   => $request->indoor_outdoor ?? 'indoor',
            'notes'            => $request->notes,
        ]);

    return redirect()->route('reservations.show', $reservation->id);
    }

    public function show(FacilityReservation $reservation)
    {
        return view('public.reservations.show', compact('reservation'));
    }

    public function print(FacilityReservation $reservation)
    {
        return view('public.reservations.print', compact('reservation'));
    }
}