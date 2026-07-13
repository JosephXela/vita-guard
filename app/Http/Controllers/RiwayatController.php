<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Riwayat;
use DB;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:staff-only');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allConsultations = Consultation::with([
            'booking.user',
            'booking.doctor.user',
            'messages'
        ])
            ->where(function ($query) {
                $query->where('status', 'CLOSED')
                    ->orWhereHas('booking', function ($q) {
                        $q->where('status', 'DONE');
                    });
            });

        if (auth()->user()->role == 'DOCTOR') {
            $allConsultations->whereHas('booking', function ($q) {
                $q->where('doctor_id', auth()->user()->doctor->id);
            });
        } elseif (auth()->user()->role == 'MEMBER') {
            $allConsultations->whereHas('booking', function ($q) {
                $q->where('user_id', auth()->id());
            });
        }

        $allConsultations = $allConsultations->get();

        return view('riwayats.index', compact('allConsultations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showDetail(Request $request)
    {
        $consultation = Consultation::with([
            'booking.user',
            'booking.doctor.user',
            'messages'
        ])->findOrFail($request->id);

        return response()->json([
            'title' => 'Detail Konsultasi',
            'body' => view('riwayats.detail', compact('consultation'))->render()
        ]);
    }
}
