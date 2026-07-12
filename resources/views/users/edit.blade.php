@extends('layouts.adminlte4')
@section('title', 'Edit User')
@section('users-active', 'active')

@section('content')
<div class="container">
    <h2>Edit User</h2>

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name"
                value="{{ old('name', $user->name) }}" placeholder="Enter User Name">

            <label>Email</label>
            <input type="email" class="form-control" name="email"
                value="{{ old('email', $user->email) }}" placeholder="Enter Email">

            <label>Phone</label>
            <input type="text" class="form-control" name="phone"
                value="{{ old('phone', $user->phone) }}" placeholder="Enter Phone Number">

            <label>Address</label>
            <textarea class="form-control" name="address" rows="3"
                placeholder="Enter Address">{{ old('address', $user->address) }}</textarea>

            <label>Birth Date</label>
            <input type="date" class="form-control" name="birth_date"
                value="{{ old('birth_date', $user->birth_date) }}">

            <label>Role</label>
            <select class="form-control" name="role">
                <option value="ADMIN" {{ $user->role == 'ADMIN' ? 'selected' : '' }}>ADMIN</option>
                <option value="DOCTOR" {{ $user->role == 'DOCTOR' ? 'selected' : '' }}>DOCTOR</option>
                <option value="MEMBER" {{ $user->role == 'MEMBER' ? 'selected' : '' }}>MEMBER</option>
            </select>
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection