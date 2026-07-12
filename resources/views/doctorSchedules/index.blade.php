@extends('layouts.adminlte4')
@section('title', 'DoctorSchedules')
@section('doctorSchedules-active', 'active')
@section('content')

    <div class="container">
        <h2>Doctor Schedules</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Doctor ID</th>
                    <th>Doctor Name</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allDoctorSchedules as $doctorSchedule)
                    <tr>
                        <td>{{ $doctorSchedule->id }}</td>

                        <td>{{ $doctorSchedule->doctor_id }}</td>
                        <td>{{ $doctorSchedule->doctor->user->name }}</td>
                        <td>
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#scheduleModal"
                                onclick="showDetail({{ $doctorSchedule->id }})">
                                Detail
                            </button>
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
            $('#detail-body').html('<div class="text-center my-3"><div class="spinner-border text-info" role="status"></div></div>');
            
            $.ajax({
                type: 'POST',
                url: '{{ route("doctorSchedules.showDetail") }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id,
                },
                success: function (data) {
                    $('#detail-title').html(data.title);
                    $('#detail-body').html(data.body);
                },
                error: function() {
                    $('#detail-body').html('<div class="alert alert-danger">Gagal mengambil data detail.</div>');
                }
            });
        }
    </script>
@endpush

@push('modal')
    <div class="modal fade" id="scheduleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detail-title">Detail Jadwal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="detail-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endpush