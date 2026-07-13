<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\ConsultationMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationMessageController extends Controller
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
        //
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
    public function store(Request $request, Consultation $consultation)
    {
        if (Auth::user()->role == 'ADMIN') {
            return redirect()
                ->route('consultations.index')
                ->with('error', 'Admin tidak dapat mengirim pesan.');
        }
        $message = new ConsultationMessage();

        $message->consultation_id = $consultation->id;
        $message->sender_type = auth()->user()->role;
        $message->sender_id = auth()->id();
        $message->message = $request->message;

        $message->save();

        if (Auth::user()->role == 'MEMBER') {
            return redirect()
                ->route('member.consultations.index')
                ->with('success', 'Pesan berhasil dikirim.');
        }

        return redirect()
            ->route('consultations.index')
            ->with('success', 'Pesan berhasil dikirim.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
}
