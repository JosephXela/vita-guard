@extends('layouts.libra')

@section('title', 'Profile of ' . $doctor->user->name)

@section('content')

<a href="{{ url()->previous() }}" class="d-inline-flex align-items-center text-decoration-none mb-4" style="color: var(--vg-muted); font-size: 0.9rem;">
    <i class="bi bi-arrow-left me-1"></i> Back to Directory
</a>

<div class="row g-4">

    <!-- Profile Card -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm text-center" style="border-radius: 14px;">
            <div class="card-body p-4">

                @if ($doctor->image && file_exists(public_path('storage/' . $doctor->image)))
                <img src="{{ asset('storage/' . $doctor->image) }}"
                    alt="Photo of {{ $doctor->user->name }}"
                    class="rounded-circle mb-3"
                    style="width: 140px; height: 140px; object-fit: cover; border: 4px solid var(--vg-bg);" />
                @else
                <img src="{{ asset('storage/img/noimage.png') }}"
                    alt="Photo not available"
                    class="rounded-circle mb-3"
                    style="width: 140px; height: 140px; object-fit: cover; border: 4px solid var(--vg-bg);" />
                @endif

                <h4 class="fw-bold mb-1">{{ $doctor->user->name }}</h4>
                <span class="d-inline-block mb-3" style="color: var(--vg-primary); font-weight: 600; font-size: 0.92rem;">
                    <i class="bi bi-clipboard2-pulse me-1"></i>{{ $doctor->specialization ?? 'General Practitioner' }}
                </span>

                <div class="d-flex justify-content-center gap-4 py-3 border-top border-bottom mb-3">
                    <div>
                        <div class="fw-bold">{{ $doctor->years_experience ?? '—' }}</div>
                        <small class="text-muted">Years of Experience</small>
                    </div>
                    <div>
                        <div class="fw-bold">{{ $doctor->doctorSchedules->count() }}</div>
                        <small class="text-muted">Practice Schedules</small>
                    </div>
                </div>

                <a href="{{ url('/member/bookings/create/'.$doctor->id) }}" class="btn text-white w-100" style="background: var(--vg-primary);">
                    <i class="bi bi-calendar-plus me-1"></i> Make an Appointment
                </a>
            </div>
        </div>
    </div>

    <!-- Details & Schedule -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm mb-4" style="border-radius: 14px;">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-3">About the Doctor</h6>
                <div class="row gy-3">
                    <div class="col-sm-6">
                        <small class="text-muted d-block">Specialization</small>
                        <span class="fw-medium">{{ $doctor->specialization ?? 'General' }}</span>
                    </div>
                    <div class="col-sm-6">
                        <small class="text-muted d-block">Experience</small>
                        <span class="fw-medium">
                            {{ $doctor->years_experience ? $doctor->years_experience : 'Not specified' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm" style="border-radius: 14px;">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-3">
                    <i class="bi bi-calendar-week me-1" style="color: var(--vg-primary);"></i> Practice Schedule
                </h6>

                @forelse ($doctor->doctorSchedules as $schedule)
                @if ($loop->first)
                <div class="table-responsive">
                    <table class="table table-borderless align-middle mb-0">
                        <tbody>
                            @endif

                            <tr class="border-bottom">
                                <td class="fw-medium" style="width: 40%;">{{ $schedule->day }}</td>
                                <td class="text-muted">
                                    <i class="bi bi-clock me-1"></i>{{ $schedule->start_time }} &ndash; {{ $schedule->end_time }}
                                </td>
                            </tr>

                            @if ($loop->last)
                        </tbody>
                    </table>
                </div>
                @endif
                @empty
                <p class="text-muted mb-0">No practice schedule available yet.</p>
                @endforelse
            </div>
        </div>
    </div>

</div>

@endsection