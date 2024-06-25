@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="Custom-color">All Profiles</h1>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Bio</th>
                    <th>Actions</th>
                    @if(auth()->user()->isAdmin())
                        <th>Edit</th>
                        <th>Delete</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach ($profiles as $profile)
                    <tr>
                        <td>{{ $profile->userName }}</td>
                        <td>{{ $profile->biography }}</td>
                        <td>
                            <a href="{{ route('profile.showProfile', ['user' => $profile->user_id]) }}" class="btn btn-primary">View</a>
                        </td>
                        @if(auth()->user()->isAdmin())
                            <td>
                                <a href="{{ route('profile.editForUser', ['user' => $profile->user_id]) }}" class="btn btn-primary">Edit for Another User</a>
                            </td>
                            <td>
                                <form action="{{ route('profile.destroy', $profile->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
