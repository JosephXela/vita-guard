<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Consultation;
use DB;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allBookings = Booking::with('doctor.user');

        if (auth()->user()->role == 'DOCTOR') {
            $allBookings->where('doctor_id', auth()->user()->doctor->id);
        } elseif (auth()->user()->role == 'MEMBER') {
            $allBookings->where('user_id', auth()->id());
        }

        $allBookings = $allBookings->get();

        return view('bookings.index', compact('allBookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctor_id = request('doctor_id');
        $doctor = \App\Models\Doctor::with('user')->find($doctor_id);

        return view('bookings.create', compact('doctor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $booking = new Booking();
        $booking->doctor_id = $request->doctor_id;
        $booking->booking_date = $request->booking_date;
        $booking->booking_time = $request->booking_time;
        $booking->status = 'pending';
        $booking->notes = $request->notes;
        $booking->user_id = auth()->id(); // nanti kalau sudah ada login

        $booking->save();

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking) {}

    public function showDetail(Request $request)
    {
        $booking = Booking::findOrFail($request->id);

        return response()->json([
            'title' => 'Detail Booking #' . $booking->id,
            'body' => view('bookings.detail', compact('booking'))->render(),
            'status' => $booking->status,
        ]);
    }

    public function updateStatus(Request $request)
    {
        $booking = Booking::findOrFail($request->id);

        $booking->status = $request->status;
        $booking->save();

        if ($request->status == 'APPROVED') {
            Consultation::create([
                'booking_id' => $booking->id,
                'status' => 'ACTIVE',
                'started_at' => now(),
                'ended_at' => null,
            ]);
        } else if ($request->status == "DONE") {
            $consultation = $booking->consultation;
            if ($consultation) {
                $consultation->status = 'CLOSED';
                $consultation->ended_at = now();
                $consultation->summary = $request->summary;
                $consultation->save();
            }
        }
        return response()->json(['success' => true]);
    }
}
