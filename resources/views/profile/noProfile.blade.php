@extends('layouts.app')
@section('content')

    <div class="container">
    <h1 class="Custom-color">All accounts with no profile</h1>

        <div class="table-responsive">
        <table class="table">
        <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Create</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('profile.createForUser',$user->id) }}" class="btn btn-secondary">Create Profile for Another User</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

@endsection
