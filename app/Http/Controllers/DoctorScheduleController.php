<?php

namespace App\Http\Controllers;

use App\Models\DoctorSchedule;
use DB;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
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
        $allDoctorSchedules = DoctorSchedule::with('doctor.user')->get();
        return view('doctorSchedules.index', compact('allDoctorSchedules'));
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
    public function show(DoctorSchedule $doctorSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DoctorSchedule $doctorSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DoctorSchedule $doctorSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DoctorSchedule $doctorSchedule)
    {
        //
    }
}
