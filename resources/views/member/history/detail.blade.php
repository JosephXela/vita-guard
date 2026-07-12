@extends('layouts.libra')

@section('content')
<div class="container" style="margin-top: 30px; margin-bottom: 50px;">
    <div class="row">
        <div class="span8 offset2">
            <div class="chat-container" style="background: #fff; border: 1px solid #eee; border-radius: 8px; overflow: hidden;">
                <div style="background: #3fbbc0; padding: 15px 20px; color: #fff; display: flex; justify-content: space-between; align-items: center;">
                    <h5 style="margin: 0; font-weight: bold; color: #fff;">Konsultasi Online: Dr. {{ $consultation->booking->doctor->user->name ?? 'Dokter' }}</h5>
                    <span style="background: rgba(255,255,255,0.2); padding: 4px 10px; border-radius: 20px; font-size: 12px;">Status: {{ ucfirst($consultation->status) }}</span>
                </div>

                <div style="height: 350px; overflow-y: auto; padding: 20px; background: #f4f7f6; display: flex; flex-direction: column; gap: 15px;">
                    @foreach($messages as $msg)
                        <div style="display: flex; flex-direction: column; align-items: {{ $msg->sender_id == auth()->id() ? 'flex-end' : 'flex-start' }};">
                            <div style="max-width: 70%; padding: 10px 15px; border-radius: 12px; background: {{ $msg->sender_id == auth()->id() ? '#3fbbc0' : '#fff' }}; color: {{ $msg->sender_id == auth()->id() ? '#fff' : '#333' }}; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                {{ $msg->message }}
                            </div>
                            <small style="color: #aaa; font-size: 10px; margin-top: 3px;">{{ $msg->created_at->format('H:i') }}</small>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection