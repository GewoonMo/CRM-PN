@extends('layouts.app')

@section('content')
    <!-- This view displays the user's profile and allows them to edit it. -->
    <div class="container-fluid text-white">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if($customer)
                    <div class="d-flex flex-column align-items-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h2 class="text-center">{{ $customer->name ?? 'No name provided' }}</h2>
                                <p class="text-muted text-center">{{ $customer->phone ?? 'No phone provided' }}</p>
                            </div>

                            <div class="row">
                                <div class="col-sm-3"><strong>Adres:</strong></div>
                                <div class="col-sm-9">{{ $customer->address ?? 'No address provided' }}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"><strong>Stad:</strong></div>
                                <div class="col-sm-9">{{ $customer->city ?? 'No city provided' }}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"><strong>Provincie:</strong></div>
                                <div class="col-sm-9">{{ $customer->state ?? 'No state provided' }}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"><strong>Postcode:</strong></div>
                                <div class="col-sm-9">{{ $customer->zip ?? 'No zip provided' }}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"><strong>Land:</strong></div>
                                <div class="col-sm-9">{{ $customer->country ?? 'No country provided' }}</div>
                            </div>

                            @if(auth()->check() && auth()->user()->id === $customer->id)
                                <div class="mt-4 d-flex justify-content-center">
                                    <a href="{{ route('customers.edit',$customer->id) }}" class="btn btn-primary mx-2">Edit Customer</a>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete Customer</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h1 class="mt-5 mb-3">No Customer found</h1>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
