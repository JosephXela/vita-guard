@extends('layouts.adminlte4')
@section('title', 'Buat Booking')
@section('bookings-active', 'active')
@section('content')

    <div class="container">
        <h2>Buat Booking</h2>

        <form method="POST" action="{{ route('bookings.store') }}">
            @csrf
            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">

            <div class="form-group mb-3">
                <label>Dokter</label>
                <input type="text" class="form-control" value="{{ $doctor->user->name ?? '-' }}" readonly>
            </div>

            <div class="form-group mb-3">
                <label>Spesialisasi</label>
                <input type="text" class="form-control" value="{{ $doctor->specialization ?? '-' }}" readonly>
            </div>

            <div class="form-group mb-3">
                <label>Tanggal Booking</label>
                <input type="date" class="form-control" name="booking_date" required>
            </div>

            <div class="form-group mb-3">
                <label>Waktu Booking</label>
                <input type="time" class="form-control" name="booking_time" required>
            </div>

            <div class="form-group mb-3">
                <label>Catatan</label>
                <textarea class="form-control" name="notes" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>

@endsection