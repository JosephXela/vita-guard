@extends('layouts.libra')

@section('content')
<div class="container">
    <h3>Active Consultation List</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Doctor</th>
                <th>Status</th>
                <th>Summary</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($myConsultations as $consultation)
            <tr>
                <td>{{ $consultation->booking->doctor->user->name }}</td>
                <td>{{ $consultation->status }}</td>
                <td>{{ $consultation->summary ?? '-' }}</td>
                <td>
                    <a href="{{ route('member.consultations.show', $consultation->id) }}" class="btn btn-theme">Open Chat</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">
                    No consultations.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection