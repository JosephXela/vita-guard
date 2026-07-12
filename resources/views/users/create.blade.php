@extends('layouts.adminlte4')
@section('title', 'Add User')
@section('users-active', 'active')

@section('content')
<div class="container">
    <h2>Add User</h2>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name"
                value="{{ old('name') }}" placeholder="Enter User Name">

            <label>Email</label>
            <input type="email" class="form-control" name="email"
                value="{{ old('email') }}" placeholder="Enter Email">

            <label>Password</label>
            <input type="password" class="form-control" name="password"
                placeholder="Enter Password">

            <label>Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation"
                placeholder="Confirm Password">

            <label>Phone</label>
            <input type="text" class="form-control" name="phone"
                value="{{ old('phone') }}" placeholder="Enter Phone Number">

            <label>Address</label>
            <textarea class="form-control" name="address" rows="3"
                placeholder="Enter Address">{{ old('address') }}</textarea>

            <label>Birth Date</label>
            <input type="date" class="form-control" name="birth_date"
                value="{{ old('birth_date') }}">

            <label>Role</label>
            <select class="form-control" name="role">
                <option value="">-- Select Role --</option>
                <option value="ADMIN">ADMIN</option>
                <option value="DOCTOR">DOCTOR</option>
                <option value="MEMBER">MEMBER</option>
            </select>
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection