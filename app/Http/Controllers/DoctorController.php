<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorSchedule;
use DB;
use Illuminate\Http\Request;
use App\Models\User;
use PDOException;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $allDoctors = Doctor::with(['user', 'schedules'])->get();
        return view('doctors.index', compact('allDoctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = strtolower(str_replace(' ', '', $request->name)) . '@vitaguard.com';
        $user->password = bcrypt('password');
        $user->role = 'DOCTOR';
        $user->save();

        // Buat doctor
        $doctor = new Doctor();
        $doctor->user_id = $user->id;
        if ($request->hasFile('image')) {
            $path = $request->file('image')
                ->store('img/doctors', 'public');

            $doctor->image = $path;
        }
        //$doctor->image = 'img/doctors/no_image_preview.png';
        $doctor->specialization = $request->specialization;
        $doctor->years_experience = $request->years_experience;
        $doctor->save();

        foreach ($request->day as $index => $day) {

            DoctorSchedule::create([
                'doctor_id' => $doctor->id,
                'day' => $day,
                'start_time' => $request->start_time[$index],
                'end_time' => $request->end_time[$index],
            ]);
        }

        return redirect()
            ->route('doctors.index')
            ->with('success', 'Successfully Created Data.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
        $this->authorize('update', $doctor);
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
        $this->authorize('update', $doctor);
        $doctor->user->name = $request->name;
        $doctor->user->save();

        if ($request->hasFile('image')) {
            $path = $request->file('image')
                ->store('img/doctors', 'public');

            $doctor->image = $path;
        }
        //$doctor->image = 'img/doctors/no_image_preview.png';
        $doctor->specialization = $request->specialization;
        $doctor->years_experience = $request->years_experience;
        $doctor->save();

        DoctorSchedule::where('doctor_id', $doctor->id)->delete();

        foreach ($request->day as $index => $day) {
            DoctorSchedule::create([
                'doctor_id' => $doctor->id,
                'day' => $day,
                'start_time' => $request->start_time[$index],
                'end_time' => $request->end_time[$index],
            ]);
        }

        return redirect()
            ->route('doctors.index')
            ->with('success', 'Successfully Updated Data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
        try {
            $doctor->delete();
            return redirect()->route('doctors.index')->with('success', 'Successfully Deleted A Doctor');
        } catch (PDOException $ex) {
            $msg = "Make Sure There Is No Related Data Before Deleting It. Please Contact Administrator To Know More About It.";
            return redirect()->route('doctors.index')->with('status', $msg);
        }
    }

    public function showDetail(Request $request)
    {
        $doctor = Doctor::with(['schedules', 'user'])->find($request->id);

        if ($doctor && $doctor->schedules->count() > 0) {
            $body = view('doctors.detail', [
                'schedules' => $doctor->schedules
            ])->render();
        } else {
            $body = "<p class='text-muted text-center my-3'>Dokter ini belum memiliki jadwal praktek.</p>";
        }

        return response()->json([
            'title' => 'Jadwal Dokter: ' . ($doctor ? $doctor->user->name : 'Tidak Ditemukan'),
            'body' => $body
        ]);
    }
}
