@extends('layouts.libra')

@section('content')
<div class="container" style="margin-top: 40px; margin-bottom: 50px;">
    <div class="row">
        <div class="span6 offset3">
            <div class="form-wrapper" style="background: #fff; border: 1px solid #eee; padding: 30px; border-radius: 8px;">
                <h4 style="font-weight: bold; margin-bottom: 5px;">Consultation Booking Form</h4>
                <p style="color: #666; margin-bottom: 25px;">Select the available operating schedule for the doctor of your choice.</p>

                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 25px; padding: 15px; background: #f9f9f9; border-radius: 6px;">
                    <div class="doctor-image">
                        @if($doctor->image && file_exists(public_path('storage/' . $doctor->image)))
                            <img src="{{ asset('storage/' . $doctor->image) }}" alt="Foto {{ $doctor->user->name }}" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" />
                        @else
                            <img src="{{ asset('storage/img/noimage.png') }}" alt="No Image Available" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" />
                        @endif
                    </div>                     
                    <div>
                        <h5 style="margin: 0; font-weight: bold;">{{ $doctor->user->name }}</h5>
                        <small style="color: #3fbbc0;">Spesialization: {{ $doctor->specialization }}</small>
                    </div>
                </div>

                <form action="{{ url('/member/bookings') }}" method="POST">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <div style="margin-bottom: 20px;">
                        <label style="font-weight: bold; display: block; margin-bottom: 8px;">Notes (Opsional):</label>
                        <textarea name="notes" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" placeholder="Write a complaint or note for the doctor..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-theme btn-block" style="padding: 12px; font-weight: bold; width: 100%;">
                        Confirmation
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection