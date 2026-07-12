@extends('layouts.adminlte4')
@section('title', 'Bookings')
@section('bookings-active', 'active')
@section('content')

<div class="container">
    <h2>Bookings</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Member Name</th>
                <th>Doctor Name</th>
                <th>Detail Booking</th>
                <th>Status</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($allBookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->user->name}}</td>
                <td>{{ $booking->doctor->user->name }}</td>
                <td>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#bookingModal"
                        onclick="showDetail({{ $booking->id }})">
                        Detail
                    </button>
                </td>
                <td>{{ $booking->status}}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">
                    No bookings.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection

@push('script')
<script>
    let bookingId = 0;

    function showDetail(id) {
        bookingId = id;

        $.ajax({
            type: 'POST',
            url: '{{ route("bookings.showDetail") }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
            },
            success: function(data) {

                $('#booking-detail-title').html(data.title);
                $('#booking-detail-body').html(data.body);

                if (data.status == 'PENDING') {

                    $('#summary').hide();

                    $('#btnApprove')
                        .text('Approve')
                        .show();

                    $('#btnCancel').show();

                } else if (data.status == 'APPROVED') {

                    $('#summary').show();

                    $('#btnApprove')
                        .text('Done')
                        .show();

                    $('#btnCancel').hide();

                } else {

                    $('#summary').hide();
                    $('#btnApprove').hide();
                    $('#btnCancel').hide();
                }
            }
        });
    }
    $('#btnApprove').click(function() {

        let status = $('#btnApprove').text() == 'Approve' ?
            'APPROVED' :
            'DONE';
        let summary = $('#summary').val();

        $.ajax({
            type: 'POST',
            url: '{{ route("bookings.updateStatus") }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: bookingId,
                status: status,
                summary: summary
            },
            success: function() {
                location.reload();
            }
        });
    });
    $('#btnCancel').click(function() {
        $.ajax({
            type: 'POST',
            url: '{{ route("bookings.updateStatus") }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: bookingId,
                status: 'CANCEL'
            },
            success: function() {
                location.reload();
            }
        });
    });
</script>
@endpush

@push('modal')
<div class="modal fade" id="bookingModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="booking-detail-title">Detail Booking</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="booking-detail-body">
                ...
            </div>
            <div class="modal-footer">
                @if(Auth::user()->role != 'MEMBER')

                <textarea
                    id="summary"
                    class="form-control mb-2"
                    rows="3"
                    placeholder="Fill in the summary when done..."
                    style="display:none"></textarea>

                <button
                    type="button"
                    class="btn btn-success"
                    id="btnApprove"
                    style="display:none">
                </button>

                @endif


                <button type="button" class="btn btn-danger" id="btnCancel">
                    Cancel
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endpush