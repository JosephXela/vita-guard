<p><b>Member</b> : {{ $consultation->booking->user->name }}</p>
<p><b>Dokter</b> : {{ $consultation->booking->doctor->user->name }}</p>

<hr>

@forelse($consultation->messages as $message)
<p>
    <b>{{ $message->sender_type }}</b> :
    {{ $message->message }}
</p>
@empty
<p class="text-muted">No conversations yet.</p>
@endforelse

<hr>

@if(Auth::user()->role != 'ADMIN')
<form action="{{ route('consultation-messages.store', $consultation->id) }}" method="POST">
    @csrf

    <textarea
        name="message"
        class="form-control"
        rows="3"
        required></textarea>

    <button class="btn btn-primary mt-2">
        Kirim
    </button>
</form>
@endif