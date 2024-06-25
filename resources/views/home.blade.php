 @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card border-0 shadow-lg">
                    <div class="card-header  bg-custom text-white">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="row align-items-center">
                            <div class="col-md-4">
                                @if(auth()->user()->profile()->first())
                                    <img src="{{ asset('storage/profile_photos/' . Auth::user()->profile()->first()->profile_photo)}}"  class="img-fluid rounded-circle" alt="{{ auth()->user()->name }}">
                                @else
                                    <img src="{{ asset('storage/profile_photos/default.jpg')}}" class="img-fluid rounded-circle Custom-color" alt="{{ auth()->user()->name }}">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h2  class="Custom-color">{{ auth()->user()->name }}</h2>
                                @if(auth()->user()->profile()->first())
                                    <p class="Custom-color">Laat het profiel van de gebruiker zien.</p>
                                    <a href="{{ route('profile.show') }}" class="btn btn-primary">Show Profile</a>
                                @else
                                    <p  class="Custom-color">Geen profiel gevonden.</p>
                                    <a href="{{ route('profile.create') }}" class="btn btn-primary">Create Profile</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
