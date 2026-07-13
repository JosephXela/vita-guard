<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Booking;
use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin-only');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jumlahDokter = Doctor::count();
        $jumlahMember = User::where('role', 'MEMBER')->count();
        $jumlahArtikel = Article::count();
        $jumlahBooking = Booking::count();
        $jumlahBookingApproved = Booking::where('status', 'APPROVED')->count();
        $jumlahBookingDone = Booking::where('status', 'DONE')->count();
        $jumlahBookingCancel = Booking::where('status', 'CANCEL')->count();
        $jumlahConsultationActive = Consultation::where('status', 'ACTIVE')->count();
        $jumlahConsultationClosed = Consultation::where('status', 'CLOSED')->count();

        return view('dashboard.index', compact(
            'jumlahDokter',
            'jumlahMember',
            'jumlahArtikel',
            'jumlahBooking',
            'jumlahBookingApproved',
            'jumlahBookingCancel',
            'jumlahBookingDone',
            'jumlahConsultationActive',
            'jumlahConsultationClosed'
        ));
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
