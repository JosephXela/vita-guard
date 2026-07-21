@extends('layouts.libra')

@section('title', 'Consultation History')

@section('content')

<div class="row mb-4">
    <div class="col-lg-9">
        <h3 class="fw-bold mb-1">Personal Medical Consultation History</h3>
        <p class="text-muted mb-0">
            Under our policy, medical conversation records are stored permanently and cannot be deleted.
        </p>
    </div>
</div>

<div class="row g-4">
    @forelse ($myHistory as $history)
    <div class="col-md-6">
        <div class="card h-100 border-0 shadow-sm" style="border-radius: 14px;">
            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span style="font-size: 0.8rem; color: var(--vg-muted);">
                        <i class="bi bi-calendar3 me-1"></i>
                        {{ $history->created_at ? $history->created_at->format('d M Y') : 'Date not available' }}
                    </span>
                    <span class="badge rounded-pill text-bg-info">Done</span>
                </div>

                <h5 class="fw-bold mb-3">
                    {{ $history->booking->doctor->user->name ?? 'Doctor not found' }}
                </h5>

                <div class="p-3 mb-3" style="background: var(--vg-bg); border-radius: 10px;">
                    <strong class="d-block mb-1" style="font-size: 0.82rem; color: var(--vg-ink);">
                        Summary / Doctor's Diagnosis
                    </strong>
                    <p class="mb-0 fst-italic" style="font-size: 0.85rem; color: var(--vg-muted);">
                        {{ $history->summary ?? 'No written summary is available. Please review the conversation details.' }}
                    </p>
                </div>

                <a href="{{ route('member.history.detail', $history->id) }}" class="btn btn-sm text-white" style="background: var(--vg-primary);">
                    <i class="bi bi-chat-dots me-1"></i> Open Chat
                </a>

            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5">
        <i class="bi bi-clock-history" style="font-size: 2.5rem; color: var(--vg-muted);"></i>
        <p class="text-muted mt-2 mb-0">No history records found.</p>
    </div>
    @endforelse
</div>

@endsection