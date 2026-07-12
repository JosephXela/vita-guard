@extends('layouts.adminlte4')
@section('title', 'Add Member')
@section('members-active', 'active')

@section('content')
<div class="container">
    <h2>Add Member</h2>

    <form method="POST" action="{{ route('members.store') }}">
        @csrf

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Member Name">

            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Email">

            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password">

            <label>Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">

            <label>Phone</label>
            <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number">

            <label>Address</label>
            <textarea class="form-control" name="address" rows="3" placeholder="Enter Address"></textarea>

            <label>Birth Date</label>
            <input type="date" class="form-control" name="birth_date">

            <input type="hidden" name="role" value="MEMBER">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection