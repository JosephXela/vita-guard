@extends('layouts.libra')

@section('content')
<div class="container" style="padding: 40px 0;">
    <div class="doctor-image">
        @if($doctor->image && file_exists(public_path('storage/' . $doctor->image)))
            <img src="{{ asset('storage/' . $doctor->image) }}" alt="Foto {{ $doctor->user->name }}" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" />
        @else
            <img src="{{ asset('storage/img/noimage.png') }}" alt="No Image Available" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" />
        @endif
    </div>  
    <h3>Doctor Profile: {{ $doctor->user->name }}</h3>
    <p><strong>Spesialization:</strong> {{ $doctor->specialization }}</p>
    <p><strong>Years of experience:</strong> {{ $doctor->years_experience ?? 'Tidak disebutkan' }}</p>
    
    <h4>Practice Schedule:</h4>
    <ul>
        @foreach($doctor->doctorSchedules as $schedule)
            <li>{{ $schedule->day }}: {{ $schedule->start_time }} - {{ $schedule->end_time }}</li>
        @endforeach
    </ul>
    
    <a href="{{ url()->previous() }}" class="btn btn-default">&laquo; Back</a>
    <a href="{{ url('/member/bookings/create/'.$doctor->id) }}" class="btn btn-theme">Make an Appointment</a>
</div>
@endsection