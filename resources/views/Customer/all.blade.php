@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="Custom-color">All Customers</h1>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Create Customer</a>


        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                    @if(auth()->user()->isAdmin())
                        <th>Edit</th>
                        <th>Delete</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        {{--                        <td>{{ $user->biography }}</td>--}}
                        <td>
                            <a href="{{ route('customers.show', ['customer' => $customer->id]) }}" class="btn btn-primary">View</a>
                        </td>
                        @if(auth()->user()->isAdmin())
                            <td>
                                <a href="{{ route('customers.edit', ['customer' => $customer->id]) }}" class="btn btn-primary">Edit for Another User</a>
                            </td>
                            <td>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
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
