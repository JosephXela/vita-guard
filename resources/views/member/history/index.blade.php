@extends('layouts.libra')

@section('content')
<div class="container" style="margin-top: 30px; margin-bottom: 50px;">
    <div class="row">
        <div class="span12">
            <h3 class="heading">Personal Medical Consultation History</h3>
            <p style="color: #666; margin-bottom: 25px;">According to the provisions, the history of this medical conversation record is stored permanently and cannot be deleted.</p>

            <div class="row">
                @forelse($myHistory as $history)
                <div class="span6" style="margin-bottom: 20px;">
                    <div style="background: #fff; border: 1px solid #eee; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <span style="font-size: 13px; color: #999;">{{ $history->created_at ? $history->created_at->format('d M Y') : 'Date not available' }}</span>                            
                        <span class="label label-info" style="background: #5bc0de; padding: 2px 6px; color:#fff; border-radius:3px;">Done</span>
                        </div>
                        <h4 style="margin: 0 0 10px 0; font-weight: bold;">
                            {{ $history->booking->doctor->user->name ?? 'Doctor not found' }}
                        </h4>
                        
                        <div style="background: #f9f9f9; padding: 12px; border-radius: 6px; margin-bottom: 15px;">
                            <strong style="font-size: 13px; display: block; margin-bottom: 5px; color: #555;">Summary / Doctor's Diagnosis:</strong>
                            <p style="font-size: 13px; margin: 0; font-style: italic; color: #666;">
                                {{ $history->summary ?? 'There is no written summary, please double check the details of the conversation content.' }}
                            </p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="span12">
                    <div class="text-center" style="padding: 4px 0; color: #999;">There is no history of completed medical consultations.</div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection