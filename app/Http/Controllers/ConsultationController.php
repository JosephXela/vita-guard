<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use DB;
use Illuminate\Http\Request;

class ConsultationController extends Controller
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
        $allConsultations = Consultation::with(
            'booking.doctor.user',
            'booking.user',
            'messages'
        );

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

        return view('consultations.index', compact('allConsultations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultation $consultation) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consultation $consultation) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultation $consultation) {}

    public function showDetail(Request $request)
    {
        $consultation = Consultation::with([
            'booking.user',
            'booking.doctor.user',
            'messages'
        ])->findOrFail($request->id);

        return response()->json([
            'title' => 'Detail Konsultasi',
            'body' => view('consultations.detail', compact('consultation'))->render()
        ]);
    }
    public function updateStatus(Request $request)
    {
        $consultation = Consultation::findOrFail($request->id);
        $consultation->status = $request->status;
        if ($request->status == 'CLOSED') {
            $consultation->ended_at = now();
        }
        $consultation->save();
        return response()->json(['success' => true]);
    }
}
