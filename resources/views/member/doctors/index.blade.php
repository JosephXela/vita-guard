@extends('layouts.libra')

@section('content')
<div class="container" style="margin-top: 30px; margin-bottom: 50px;">
    <div class="row">
        <div class="span12">
            <h3 class="heading">Medical Personnel Directory</h3>
            <p>Select a doctor to conduct an online medical consultation.</p>
        </div>
    </div>

    <div class="row">
        @foreach ($allDoctors as $doctor)
        <div class="span6" style="margin-bottom: 20px;">
            <div class="team-box" style="display: flex; background: #fff; border: 1px solid #eee; padding: 20px; border-radius: 8px; gap: 20px;">
            <div class="doctor-image">
                @if($doctor->image && file_exists(public_path('storage/' . $doctor->image)))
                    <img src="{{ asset('storage/' . $doctor->image) }}" alt="Foto {{ $doctor->user->name }}" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" />
                @else
                    <img src="{{ asset('storage/img/noimage.png') }}" alt="No Image Available" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" />
                @endif
            </div>                
            <div class="profile-details" style="flex: 1;">
                    <h4 style="margin: 0 0 5px 0; font-weight: bold;">{{ $doctor->user->name }}</h4>
                    <span style="color: #3fbbc0; font-weight: 500; display: block; margin-bottom: 10px;">Spesialization: {{ $doctor->specialization ?? 'Umum' }}</span>
                    <div>
                        <a href="{{ route('member.doctors.show', $doctor->id) }}" class="btn btn-theme">Profile</a> 
                        <a href="{{ url('/member/bookings/create/'.$doctor->id) }}" class="btn btn-theme" style="padding: 5px 15px; font-size: 13px;">
                            Make an Appointment
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection