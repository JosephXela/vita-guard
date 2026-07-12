@extends('layouts.adminlte4')
@section('title', 'Members')
@section('members-active', 'active')
@section('content')

<div class="container">
    <h2>Members</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('status'))
    <div class="alert alert-warning">
        {{ session('status') }}
    </div>
    @endif

    @can('create-permission', Auth::user())
    <a href="{{ route('members.create') }}" class="btn-primary"> + New Member </a>
    @endcan
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Profile</th>
                @can('action-read', Auth::user())
                <th>Edit</th>
                @endcan

                @can('delete-permission', Auth::user())
                <th>Delete</th>
                @endcan
            </tr>
        </thead>

        <tbody>
            @foreach($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->email }}</td>
                <td>
                    <button type="button"
                        class="btn btn-primary btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#memberModal-{{ $member->id }}">
                        Show
                    </button>
                </td>
                @can('update-permission', Auth::user())
                <td>
                    <a href="{{ route('members.edit', $member->id) }}"
                        class="btn btn-warning btn-sm">
                        Edit
                    </a>
                </td>
                @endcan

                @can('delete-permission', Auth::user())
                <td>
                    <form action="{{ route('members.destroy', $member->id) }}"
                        method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete {{ $member->name }} ?')">
                            Delete
                        </button>

                    </form>
                </td>
                @endcan
            </tr>
            @push('modal')
            <div class="modal fade"
                id="memberModal-{{ $member->id }}"
                tabindex="-1"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                Profile Member
                            </h5>
                            <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $member->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $member->email }}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>{{ $member->role }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $member->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $member->address }}</td>
                                </tr>
                                <tr>
                                    <th>BOD</th>
                                    <td>{{ $member->birth_date }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary"
                                data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endpush
            @endforeach
        </tbody>
    </table>
</div>
@endsection