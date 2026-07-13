<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Article;
use App\Models\Doctor;
use App\Models\Booking;
use App\Models\Consultation;
use App\Models\DoctorSchedule;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:member-only');
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

    public function indexArticles(Request $request)
    {
        $query = Article::with('doctor.user');

        if ($request->has('search')) {
            $query->where('article_name', 'like', '%' . $request->search . '%');
        }

        $allArticles = $query->get();
        return view('member.articles.index', compact('allArticles'));
    }

    public function showArticle(Article $article)
    {
        return view('member.articles.show', compact('article'));
    }

    public function indexDoctors()
    {
        $allDoctors = Doctor::with('user', 'doctorSchedules')->get();
        return view('member.doctors.index', compact('allDoctors'));
    }

    public function showDoctor(Doctor $doctor)
    {
        $doctor->load('user', 'doctorSchedules');
        return view('member.doctors.show', compact('doctor'));
    }

    public function createBooking(Doctor $doctor)
    {
        $schedules = DoctorSchedule::where('doctor_id', $doctor->id)->get();

        return view('member.bookings.create', compact('doctor', 'schedules'));
    }

    public function storeBooking(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
        ]);

        Booking::create([
            'user_id'      => Auth::id(),
            'doctor_id'    => $request->doctor_id,
            'booking_date' => now()->toDateString(),
            'booking_time' => now()->toTimeString(),
            'status'       => 'pending',
            'notes'        => $request->notes,
        ]);

        return redirect()->route('member.bookings.index')->with('success', 'Booking berhasil disimpan.');
    }

    public function indexBookings()
    {
        $myBookings = Booking::with('doctor.user')
            ->where('user_id', Auth::id())
            ->get();
        return view('member.bookings.index', compact('myBookings'));
    }

    public function indexConsultations()
    {
        $myConsultations = Consultation::with('booking.doctor.user')
            ->whereHas('booking', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->where('status', 'ACTIVE')
            ->get();

        return view('member.consultations.index', compact('myConsultations'));
    }

    public function showConsultation(Consultation $consultation)
    {
        $consultation->load('booking');

        if ($consultation->booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $messages = $consultation->messages()->orderBy('created_at', 'asc')->get();
        return view('member.consultations.show', compact('consultation', 'messages'));
    }
    public function detailHistory(Consultation $consultation)
    {
        $consultation->load('booking');

        if ($consultation->booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $messages = $consultation->messages()->orderBy('created_at', 'asc')->get();
        return view('member.history.detail', compact('consultation', 'messages'));
    }

    public function indexHistory()
    {
        $myHistory = Consultation::with('booking.doctor.user')
            ->whereHas('booking', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->where('status', 'CLOSED')
            ->get();

        return view('member.history.index', compact('myHistory'));
    }
}
