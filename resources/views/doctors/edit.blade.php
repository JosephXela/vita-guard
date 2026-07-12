@extends('layouts.adminlte4')
@section('content')
<div class="container">

    <h2>Edit Doctors</h2>
    <form method="POST" action="{{ route('doctors.update', $doctor->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name"
                placeholder="Enter Doctor Name" value="{{ old('name', $doctor->user->name) }}">

            <label>Image</label>
            <input type="file" class="form-control" id="image" name="image">

            <label for="specialization">Specialization</label>
            <input type="text" class="form-control" id="specialization" name="specialization"
                placeholder="Enter Specialization Name" value="{{ old('specialization', $doctor->specialization) }}">

            <label for="years_experience">Years Experience</label>
            <input type="text" class="form-control" id="years_experience" name="years_experience"
                placeholder="Enter Years Experience" value="{{ old('years_experience', $doctor->years_experience) }}">
        </div>

        <hr>
        <h5>Jadwal Praktik</h5>

        <div id="schedule-container">
            @forelse($doctor->schedules as $schedule)
            <div class="schedule-row row mb-2">
                <div class="col-md-4">
                    <label>Day</label>
                    <select name="day[]" class="form-control">
                        <option value="">-- Select Day --</option>
                        @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $day)
                        <option value="{{ $day }}" {{ $schedule->day == $day ? 'selected' : '' }}>
                            {{ $day }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Start Time</label>
                    <input type="time" name="start_time[]" class="form-control"
                        value="{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}">
                </div>

                <div class="col-md-3">
                    <label>End Time</label>
                    <input type="time" name="end_time[]" class="form-control"
                        value="{{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}">
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove-row w-100">
                        Hapus
                    </button>
                </div>
            </div>
            @empty
            <div class="schedule-row row mb-2">
                <div class="col-md-4">
                    <label>Day</label>
                    <select name="day[]" class="form-control">
                        <option value="">-- Select Day --</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Start Time</label>
                    <input type="time" name="start_time[]" class="form-control">
                </div>

                <div class="col-md-3">
                    <label>End Time</label>
                    <input type="time" name="end_time[]" class="form-control">
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove-row w-100">
                        Hapus
                    </button>
                </div>
            </div>
            @endforelse
        </div>

        <button type="button" id="addSchedule" class="btn btn-success mt-2">
            + Tambah Jadwal
        </button>

        <br><br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@push('script')
<script>
    $('#addSchedule').click(function() {
        let row = `
        <div class="schedule-row row mb-2">
            <div class="col-md-4">
                <select name="day[]" class="form-control">
                    <option value="">-- Select Day --</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
            </div>

            <div class="col-md-3">
                <input type="time" name="start_time[]" class="form-control">
            </div>

            <div class="col-md-3">
                <input type="time" name="end_time[]" class="form-control">
            </div>

            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-row w-100">
                    Hapus
                </button>
            </div>
        </div>
        `;

        $('#schedule-container').append(row);
    });

    $(document).on('click', '.remove-row', function() {
        if ($('#schedule-container .schedule-row').length > 1) {
            $(this).closest('.schedule-row').remove();
        } else {
            alert('Minimal harus ada 1 jadwal praktik.');
        }
    });
</script>
@endpush