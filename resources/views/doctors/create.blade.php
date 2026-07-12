@extends('layouts.adminlte4')
@section('content')
<div class="container">
    <h2>Add Doctors</h2>

    <form method="POST" action="{{route('doctors.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                placeholder="Enter Doctor Name">
            <small id="name" class="form-text text-muted">Please write down Doctor Name here.</small>

            <br>
            <label>Image</label>
            <input type="file" class="form-control" id="image" name="image" aria-describedby="name"
                placeholder="Enter Image">
            <small id="image" class="form-text text-muted">Please put image here.</small>

            <br>
            <label for="name">Specialization</label>
            <input type="text" class="form-control" id="specialization" name="specialization" aria-describedby="name"
                placeholder="Enter Specialization Name">
            <small id="name" class="form-text text-muted">Please write down Doctor Specialization here.</small>

            <br>
            <label for="name">Years of Experience</label>
            <input type="text" class="form-control" id="years_experience" name="years_experience" aria-describedby="name"
                placeholder="Enter Years Experience">
            <small id="name" class="form-text text-muted">Please write down Doctor Years Experience here.</small>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection