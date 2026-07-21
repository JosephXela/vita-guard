@extends('layouts.libra')

@section('title', 'Doctors')

@section('content')

<!-- Page Header -->
<div class="row mb-4">
    <div class="col-lg-8">
        <h3 class="fw-bold mb-1">Doctors</h3>
        <p class="text-muted mb-0">Choose a doctor to do an online health consultation.</p>
    </div>
    <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
        <span class="badge rounded-pill" style="background: rgba(15,110,94,0.1); color: var(--vg-primary); font-weight: 600; padding: 0.55rem 1rem;">
            <i class="bi bi-person-badge me-1"></i> {{ $allDoctors->count() }} Doctors Available
        </span>
    </div>
</div>

@forelse ($allDoctors as $doctor)
@if ($loop->first)
<div class="row g-4">
    @endif

    <div class="col-md-6">
        <div class="card h-100 border-0 shadow-sm" style="border-radius: 14px;">
            <div class="card-body p-4 d-flex gap-3">

                <div class="flex-shrink-0">
                    @if ($doctor->image && file_exists(public_path('storage/' . $doctor->image)))
                    <img src="{{ asset('storage/' . $doctor->image) }}"
                        alt="Foto {{ $doctor->user->name }}"
                        class="rounded-circle"
                        style="width: 96px; height: 96px; object-fit: cover; border: 3px solid var(--vg-bg);" />
                    @else
                    <img src="{{ asset('storage/img/noimage.png') }}"
                        alt="Foto tidak tersedia"
                        class="rounded-circle"
                        style="width: 96px; height: 96px; object-fit: cover; border: 3px solid var(--vg-bg);" />
                    @endif
                </div>

                <div class="flex-grow-1">
                    <h5 class="fw-bold mb-1">{{ $doctor->user->name }}</h5>
                    <span class="d-inline-block mb-2" style="color: var(--vg-primary); font-size: 0.88rem; font-weight: 600;">
                        <i class="bi bi-clipboard2-pulse me-1"></i>{{ $doctor->specialization ?? 'General Practitioners' }}
                    </span>

                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <a href="{{ route('member.doctors.show', $doctor->id) }}" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-person-lines-fill me-1"></i> View Profile
                        </a>
                        <a href="{{ url('/member/bookings/create/'.$doctor->id) }}" class="btn btn-sm text-white" style="background: var(--vg-primary);">
                            <i class="bi bi-calendar-plus me-1"></i> Make an Appointment
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @if ($loop->last)
</div>
@endif
@empty
<div class="text-center py-5">
    <i class="bi bi-person-x" style="font-size: 2.5rem; color: var(--vg-muted);"></i>
    <p class="text-muted mt-2 mb-0">There are no doctors currently listed.</p>
</div>
@endforelse

@endsection