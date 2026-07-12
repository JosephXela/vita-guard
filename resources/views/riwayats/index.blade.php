@extends('layouts.adminlte4')
@section('title', 'Consultation History')
@section('riwayats-active', 'active')

@section('content')

<div class="container">
    <h2>Consultation Histories</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Member Name</th>
                <th>Doctor Name</th>
                <th>Detail</th>
            </tr>
        </thead>

        <tbody>
            @forelse($allConsultations as $consultation)
            <tr>
                <td>{{ $consultation->id }}</td>
                <td>{{ $consultation->booking->booking_date }}</td>
                <td>{{ $consultation->booking->user->name }}</td>
                <td>{{ $consultation->booking->doctor->user->name }}</td>
                <td>
                    <button class="btn btn-info"
                        data-bs-toggle="modal"
                        data-bs-target="#consultationModal"
                        onclick="showDetail({{ $consultation->id }})">
                        Detail
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">
                    No histories.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection

@push('script')
<script>
    function showDetail(id) {
        $('#consultation-detail-body').html(
            '<div class="text-center my-3"><div class="spinner-border text-info"></div></div>'
        );

        $.ajax({
            type: 'POST',
            url: '{{ route("riwayats.showDetail") }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function(data) {
                $('#consultation-detail-title').html(data.title);
                $('#consultation-detail-body').html(data.body);
            },
            error: function() {
                $('#consultation-detail-body').html(
                    '<div class="alert alert-danger">Gagal mengambil data.</div>'
                );
            }
        });
    }
</script>
@endpush

@push('modal')
<div class="modal fade" id="consultationModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="consultation-detail-title">
                    Detail Consultation
                </h5>

                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body" id="consultation-detail-body">
                ...
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>
@endpush