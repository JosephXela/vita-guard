<p><b>Member</b> : {{ $consultation->booking->user->name }}</p>
<p><b>Dokter</b> : {{ $consultation->booking->doctor->user->name }}</p>

<hr>

@foreach($consultation->messages as $message)
<p>
    <b>{{ $message->sender_type }}</b> :
    {{ $message->message }}
</p>
@endforeach
<hr>
<h5><b>Summary</b></h5>
<p>{{$consultation->summary}}</p>