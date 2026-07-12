@extends('layouts.adminlte4')
@section('title', 'Edit Member')
@section('members-active', 'active')

@section('content')
<div class="container">
    <h2>Edit Member</h2>

    <form method="POST" action="{{ route('members.update', $member->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name"
                value="{{ old('name', $member->name) }}" placeholder="Enter Member Name">

            <label>Email</label>
            <input type="email" class="form-control" name="email"
                value="{{ old('email', $member->email) }}" placeholder="Enter Email">

            <label>Phone</label>
            <input type="text" class="form-control" name="phone"
                value="{{ old('phone', $member->phone) }}" placeholder="Enter Phone Number">

            <label>Address</label>
            <textarea class="form-control" name="address" rows="3"
                placeholder="Enter Address">{{ old('address', $member->address) }}</textarea>

            <label>Birth Date</label>
            <input type="date" class="form-control" name="birth_date"
                value="{{ old('birth_date', $member->birth_date) }}">

            <input type="hidden" name="role" value="MEMBER">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection