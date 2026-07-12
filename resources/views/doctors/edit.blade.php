@extends('layouts.adminlte4')
@section('content')
<div class="container">

    <h2>Edit Doctors</h2>
    <form method="POST" action="{{route('doctors.update', $doctor->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                placeholder="Enter Doctor Name" value="{{ $doctor->user->name }}">
            <small id="name" class="form-text text-muted">Please write down Doctor Name here.</small>

            <br>
            <label>Image</label>
            <input type="file" class="form-control" id="image" name="image" aria-describedby="name"
                placeholder="Enter Image" value="{{ $doctor->image }}">
            <small id="image" class="form-text text-muted">Please put image here.</small>

            <br>
            <label for="name">Specialization</label>
            <input type="text" class="form-control" id="specialization" name="specialization" aria-describedby="name"
                placeholder="Enter Specialization Name" value="{{ $doctor->specialization }}">
            <small id="name" class="form-text text-muted">Please write down Doctor Specialization here.</small>

            <br>
            <label for="name">Years Experience</label>
            <input type="text" class="form-control" id="years_experience" name="years_experience" aria-describedby="name"
                placeholder="Enter Years experience Name" value="{{ $doctor->years_experience }}">
            <small id="name" class="form-text text-muted">Please write down Doctor Years Experience here.</small>

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection