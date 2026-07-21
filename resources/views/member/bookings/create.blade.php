@extends('layouts.libra')

@section('title', 'Book a Consultation')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm" style="border-radius: 14px;">
                <div class="card-body p-4 p-md-5">

                    <h4 class="fw-bold mb-1">Consultation Booking Form</h4>
                    <p class="text-muted mb-4">Select the available operating schedule for the doctor of your choice.</p>

                    <!-- Doctor Summary -->
                    <div class="d-flex align-items-center gap-3 p-3 mb-4" style="background: var(--vg-bg); border-radius: 10px;">
                        @if ($doctor->image && file_exists(public_path('storage/' . $doctor->image)))
                            <img src="{{ asset('storage/' . $doctor->image) }}"
                                 alt="Photo of {{ $doctor->user->name }}"
                                 class="rounded-circle"
                                 style="width: 64px; height: 64px; object-fit: cover;" />
                        @else
                            <img src="{{ asset('storage/img/noimage.png') }}"
                                 alt="Photo not available"
                                 class="rounded-circle"
                                 style="width: 64px; height: 64px; object-fit: cover;" />
                        @endif

                        <div>
                            <h6 class="fw-bold mb-0">{{ $doctor->user->name }}</h6>
                            <small style="color: var(--vg-primary); font-weight: 600;">
                                <i class="bi bi-clipboard2-pulse me-1"></i>{{ $doctor->specialization }}
                            </small>
                        </div>
                    </div>

                    <!-- Booking Form -->
                    <form action="{{ url('/member/bookings') }}" method="POST">
                        @csrf
                        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">

                        <div class="mb-4">
                            <label class="form-label fw-bold">Notes (Optional)</label>
                            <textarea name="notes" rows="3" class="form-control" placeholder="Write a complaint or note for the doctor..."></textarea>
                        </div>

                        <button type="submit" class="btn text-white w-100 py-2 fw-bold" style="background: var(--vg-primary);">
                            <i class="bi bi-check2-circle me-1"></i> Confirm Booking
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection