@extends('layouts.libra')

@section('title', 'My Consultations')

@section('content')

<div class="row mb-4">
    <div class="col-lg-8">
        <h3 class="fw-bold mb-1">Active Consultation List</h3>
        <p class="text-muted mb-0">Continue your ongoing conversations with your doctors.</p>
    </div>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 14px;">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr style="background: var(--vg-bg);">
                    <th class="ps-4">Doctor</th>
                    <th>Status</th>
                    <th>Summary</th>
                    <th class="pe-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($myConsultations as $consultation)
                <tr>
                    <td class="ps-4 fw-medium">{{ $consultation->booking->doctor->user->name }}</td>
                    <td>
                        @if ($consultation->status == 'ACTIVE')
                        <span class="badge rounded-pill text-bg-success">Active</span>
                        @else
                        <span class="badge rounded-pill text-bg-secondary">{{ ucfirst(strtolower($consultation->status)) }}</span>
                        @endif
                    </td>
                    <td class="text-muted">{{ $consultation->summary ?? '-' }}</td>
                    <td class="pe-4">
                        <a href="{{ route('member.consultations.show', $consultation->id) }}" class="btn btn-sm text-white" style="background: var(--vg-primary);">
                            <i class="bi bi-chat-dots me-1"></i> Open Chat
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-5">
                        <i class="bi bi-chat-square-text" style="font-size: 2rem; color: var(--vg-muted);"></i>
                        <p class="text-muted mt-2 mb-0">You don't have any consultations yet.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection