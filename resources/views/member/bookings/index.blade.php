@extends('layouts.libra')

@section('content')
<div class="container" style="margin: 0 auto; width: 90%; max-width: 1200px;">
    <div class="row">
        <div class="span12">
            <h3 class="heading">Your Consultation Booking Status</h3>
            
            @if(session('success'))
                <div class="alert alert-success" style="padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                    {{ session('success') }}
                </div>
            @endif

            <div style="margin: 0 auto; display: table; width: 100%;">
                <table class="table table-striped" style="background: #fff; border: 1px solid #eee;">
                    <thead>
                        <tr style="background: #f5f5f5;">
                            <th>Doctor Name</th>
                            <th>Selected Schedule</th>
                            <th>Order Status</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($myBookings as $booking)
                            <tr>
                                <td>{{ $booking->doctor->user->name }}</td>
                                <td>{{ $booking->booking_date }}<br>o'clock: {{ $booking->booking_time }}</td>
                                <td>
                                    @if($booking->status == 'PENDING')
                                        <span class="label label-warning">PENDING</span>
                                    @elseif($booking->status == 'APPROVED')
                                        <span class="label label-success">APPROVED</span>
                                    @elseif($booking->status == 'DONE')
                                        <span class="label label-info">DONE</span>
                                    @else
                                        <span class="label label-important">REJECTED</span>
                                    @endif
                                </td>
                                <td>{{ $booking->notes ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>               
            </div>
        </div>
    </div>
</div>
@endsection