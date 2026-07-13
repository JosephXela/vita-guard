@extends('layouts.adminlte4')
@section('title', 'Doctors')
@section('doctors-active', 'active')
@section('content')

<div class="container">
    <h2>Doctors</h2>

    @if (@session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (@session('status'))
    <div class="alert alert-warning">
        {{ session('status') }}
    </div>
    @endif

    @can('create-permission', Auth::user())
    <a href="{{ route('doctors.create') }}" class="btn-primary"> + New Doctor </a>
    @endcan

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Profile Doctor</th>

                <th>Specialization</th>
                <th>Years of Experience</th>

                <th>Detail Schedule</th>

                @if(Auth::user()->role === 'DOCTOR')
                <th>Action Edit</th>
                @endif
                
                @can('action-read', Auth::user())
                <th>Action Edit</th>
                <th>Action Delete</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($allDoctors as $doctor)
            <tr>
                <td>{{ $doctor->id }}</td>
                <td>{{ $doctor->user->name }}</td>

                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#imageModal-{{ $doctor->id }}">
                        Show
                    </button>
                </td>
                @push ('modal')
                <!-- Modal -->
                <div class="modal fade" id="imageModal-{{ $doctor->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Profil {{ $doctor->user->name }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if(auth()->user()->role == 'MEMBER')
                                {{-- Tampilan lengkap untuk member --}}
                                <div class="text-center mb-3">
                                    <img src="{{ asset('storage/' . $doctor->image) }}" width="50%" class="rounded">
                                </div>
                                <table class="table table-borderless">
                                    <tr>
                                        <th style="width:130px;">Nama</th>
                                        <td>: {{ $doctor->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Spesialisasi</th>
                                        <td>: {{ $doctor->specialization }}</td>
                                    </tr>
                                    <tr>
                                        <th>Years of Experience</th>
                                        <td>: {{ $doctor->years_experience }}</td>
                                    </tr>
                                </table>
                                @else
                                {{-- Tampilan foto saja untuk admin/doctor --}}
                                <img src="{{ asset('storage/' . $doctor->image) }}" width="100%">
                                {{ $doctor->id }} - {{ $doctor->user->name }} {{ $doctor->specialization }}
                                @endif
                            </div>
                            <div class="modal-footer">
                                @if(auth()->user()->role == 'MEMBER')
                                <a href="{{ route('bookings.create', ['doctor_id' => $doctor->id]) }}"
                                    class="btn btn-success">Booking</a>
                                @endif
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endpush

                <td>{{ $doctor->specialization}}</td>
                <td>{{ $doctor->years_experience }}</td>

                <td>
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#scheduleModal"
                        onclick="showDetail({{ $doctor->id }})">
                        Detail
                    </button>
                </td>

                @can('update', $doctor)
                <td>
                    <a class="btn btn-warning" href="{{ route('doctors.edit', $doctor->id) }}">Edit</a>
                </td>
                @endcan

                @can('delete-permission', Auth::user())
                <td>
                    <form method="POST" action="{{ route('doctors.destroy', $doctor->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger"
                            onclick="return confirm('Are You Sure To Delete {{ $doctor->id }} - {{ $doctor->user->name }}?');">
                    </form>
                </td>
                @endcan

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
            url: '{{ route("doctors.showDetail") }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id
            },
            success: function(data) {
                $('#detail-title').html(data.title);
                $('#detail-body').html(data.body);
            },
            error: function() {
                $('#detail-body').html('<div class="alert alert-danger">Gagal mengambil data jadwal.</div>');
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