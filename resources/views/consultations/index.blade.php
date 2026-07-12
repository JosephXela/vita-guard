@extends('layouts.adminlte4')
@section('title', 'Consultations')
@section('consultations-active', 'active')
@section('content')

<div class="container">
    <h2>Consultations</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Member Name</th>
                <th>Doctor Name</th>
                <th>Detail Consultation</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allConsultations as $consultation)
            <tr>
                <td>{{ $consultation->id }}</td>
                <td>{{ $consultation->booking->user->name}}</td>
                <td>{{ $consultation->booking->doctor->user->name }}</td>
                <td>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#consultationModal"
                        onclick="showDetail({{ $consultation->id }})">
                        Detail
                    </button>
                </td>
                <td>
                    @if($consultation->status == 'ACTIVE')
                    <button class="btn btn-success btn-sm"
                        onclick="updateStatus({{ $consultation->id }}, 'CLOSED')">
                        ACTIVE
                    </button>
                    @else
                    <button class="btn btn-secondary btn-sm" disabled>
                        CLOSED
                    </button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@push('script')
<script>
    function showDetail(id) {
        $('#consultation-detail-body').html('<div class="text-center my-3"><div class="spinner-border text-info" role="status"></div></div>');

        $.ajax({
            type: 'POST',
            url: '{{ route("consultations.showDetail") }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id,
            },
            success: function(data) {
                $('#consultation-detail-title').html(data.title);
                $('#consultation-detail-body').html(data.body);
            },
            error: function() {
                $('#consultation-detail-body').html('<div class="alert alert-danger">Gagal mengambil data detail konsultasi.</div>');
            }
        });
    }

    function updateStatus(id, status) {
        $.ajax({
            type: 'POST',
            url: '{{ route("consultations.updateStatus") }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                status: status
            },
            success: function() {
                location.reload();
            },
            error: function() {
                alert('Gagal mengubah status.');
            }
        });
    }
</script>
@endpush

@push('modal')
<div class="modal fade" id="consultationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="consultation-detail-title">Detail Konsultasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="consultation-detail-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endpush