@extends('layouts.adminlte4')
@section('content')
<div class="container">
    <h2>Add Articles</h2>
    <form method="POST" action="{{route('articles.store') }}" enctype="multipart/form-data">
        
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="article_name" name="article_name" aria-describedby="name"
                placeholder="Enter Article Name">
            <small id="name" class="form-text text-muted">Please write down Article Name here.</small>

            <br>
            <label for="name">Content</label>
            <input type="text" class="form-control" id="content" name="content" aria-describedby="name"
                placeholder="Enter Content Name">
            <small id="name" class="form-text text-muted">Please write down Content here.</small>

            <br><!--SEMENTARA INI DULU KARENA BELUM ADA LOGIN-->
            <label for="name">Doctor ID</label>
            <input type="text" class="form-control" id="doctor_id" name="doctor_id" aria-describedby="name"
                placeholder="Enter Doctor ID">
            <small id="name" class="form-text text-muted">Please write down Doctor ID here.</small>

            <br>
            <label>Image</label>
            <input type="file" class="form-control" id="image" name="image" aria-describedby="name"
                placeholder="Enter Image">
            <small id="image" class="form-text text-muted">Please put image here.</small>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection