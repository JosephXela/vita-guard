@extends('layouts.libra')

@section('title', 'Consultation Chat')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 14px;">

            <!-- Chat Header -->
            <div class="d-flex justify-content-between align-items-center px-4 py-3" style="background: var(--vg-primary);">
                <h5 class="mb-0 fw-bold text-white">
                    <i class="bi bi-chat-dots me-2"></i>Online Consultation: {{ $consultation->booking->doctor->user->name ?? 'Doctor' }}
                </h5>
                <span class="badge rounded-pill" style="background: rgba(255,255,255,0.2); color: #fff;">
                    Status: {{ ucfirst(strtolower($consultation->status)) }}
                </span>
            </div>

            <!-- Chat Body -->
            <div class="d-flex flex-column gap-3 p-4" style="height: 380px; overflow-y: auto; background: var(--vg-bg);">
                @forelse ($messages as $msg)
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
                @empty
                <div class="text-center m-auto">
                    <i class="bi bi-chat-heart" style="font-size: 2rem; color: var(--vg-muted);"></i>
                    <p class="text-muted mt-2 mb-0">No messages yet. Type your first message to start the consultation.</p>
                </div>
                @endforelse
            </div>

            <!-- Chat Input -->
            <div class="p-3 bg-white border-top">
                @if ($consultation->status == 'ACTIVE')
                <form action="{{ route('member.consultations-messages.store', $consultation->id) }}" method="GET" class="d-flex gap-2 mb-0">
                    @csrf
                    <input type="hidden" name="consultation_id" value="{{ $consultation->id }}">
                    <input type="text" name="message" required class="form-control" placeholder="Write your medical message here...">
                    <button type="submit" class="btn text-white px-4" style="background: var(--vg-primary);">
                        <i class="bi bi-send-fill"></i> Send
                    </button>
                </form>
                @else
                <div class="alert alert-warning text-center mb-0">
                    <i class="bi bi-lock-fill me-1"></i>
                    This consultation session has been closed by the doctor. The summary has been saved to your medical history.
                </div>
                @endif
            </div>

        </div>
    </div>
</div>

@endsection