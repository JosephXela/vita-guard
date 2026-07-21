@extends('layouts.libra')

@section('title', 'My Bookings')

@section('content')

<div class="row mb-4">
    <div class="col-lg-8">
        <h3 class="fw-bold mb-1">Your Consultation Booking Status</h3>
        <p class="text-muted mb-0">Track the progress of your consultation requests.</p>
    </div>
</div>

@if (session('success'))
<div class="alert alert-success d-flex align-items-center gap-2 border-0 shadow-sm" style="border-radius: 10px;" role="alert">
    <i class="bi bi-check-circle-fill"></i>
    <div>{{ session('success') }}</div>
</div>
@endif

<div class="card border-0 shadow-sm" style="border-radius: 14px;">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr style="background: var(--vg-bg);">
                    <th class="ps-4">Doctor Name</th>
                    <th>Selected Schedule</th>
                    <th>Order Status</th>
                    <th class="pe-4">Notes</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($myBookings as $booking)
                <tr>
                    <td class="ps-4 fw-medium">{{ $booking->doctor->user->name }}</td>
                    <td>
                        {{ $booking->booking_date }}
                        <br>
                        <small class="text-muted"><i class="bi bi-clock me-1"></i>{{ $booking->booking_time }}</small>
                    </td>
                    <td>
                        @if ($booking->status == 'PENDING')
                        <span class="badge rounded-pill text-bg-warning">Pending</span>
                        @elseif ($booking->status == 'APPROVED')
                        <span class="badge rounded-pill text-bg-success">Approved</span>
                        @elseif ($booking->status == 'DONE')
                        <span class="badge rounded-pill text-bg-info">Done</span>
                        @else
                        <span class="badge rounded-pill text-bg-danger">Rejected</span>
                        @endif
                    </td>
                    <td class="pe-4 text-muted">{{ $booking->notes ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-5">
                        <i class="bi bi-calendar-x" style="font-size: 2rem; color: var(--vg-muted);"></i>
                        <p class="text-muted mt-2 mb-0">You don't have any bookings yet.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection