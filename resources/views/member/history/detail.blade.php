@extends('layouts.libra')

@section('title', 'Consultation History Detail')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 14px;">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center px-4 py-3" style="background: var(--vg-primary);">
                <h5 class="mb-0 fw-bold text-white">
                    <i class="bi bi-chat-dots me-2"></i>Online Consultation: {{ $consultation->booking->doctor->user->name ?? 'Doctor' }}
                </h5>
                <span class="badge rounded-pill" style="background: rgba(255,255,255,0.2); color: #fff;">
                    Status: {{ ucfirst(strtolower($consultation->status)) }}
                </span>
            </div>

            <!-- Message Log (read-only) -->
            <div class="d-flex flex-column gap-3 p-4" style="height: 380px; overflow-y: auto; background: var(--vg-bg);">
                @foreach ($messages as $msg)
                <div class="d-flex flex-column" style="align-items: {{ $msg->sender_id == auth()->id() ? 'flex-end' : 'flex-start' }};">
                    <div class="px-3 py-2 shadow-sm"
                        style="max-width: 70%; border-radius: 14px;
                                        background: {{ $msg->sender_id == auth()->id() ? 'var(--vg-primary)' : '#ffffff' }};
                                        color: {{ $msg->sender_id == auth()->id() ? '#ffffff' : 'var(--vg-ink)' }};">
                        {{ $msg->message }}
                    </div>
                    <small class="mt-1" style="color: var(--vg-muted); font-size: 0.72rem;">
                        {{ $msg->created_at->format('H:i') }}
                    </small>
                </div>
                @endforeach
            </div>

            <!-- Closed Notice -->
            <div class="p-3 bg-white border-top">
                <div class="alert alert-secondary text-center mb-0">
                    <i class="bi bi-archive-fill me-1"></i>
                    This is an archived conversation. Consultation history cannot be edited or continued.
                </div>
            </div>

        </div>
    </div>
</div>

@endsection