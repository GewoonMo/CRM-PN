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

                @if($profile)
                    <div class="d-flex flex-column align-items-center">
                        <div class="mb-4">
                            @if($profile->profile_photo)
                                <img src="{{ asset('storage/profile_photos/' . $profile->profile_photo) }}" alt="Profile photo" class="rounded-circle" style="width: 200px; height: 200px;">
                            @else
                                <img src="{{ asset('storage/profile_photos/default.jpg') }}" alt="Default profile photo" class="rounded-circle" style="width: 200px; height: 200px;">
                            @endif
                        </div>

                        <div class="col-md-8">
                            <div class="mb-4">
                                <h2 class="text-center">{{ $profile->userName }}</h2>
                                <p class="text-muted text-center">{{ $profile->biography ?? 'No biography provided' }}</p>
                            </div>

                            <div class="row">
                                <div class="col-sm-3"><strong>Experience:</strong></div>
                                <div class="col-sm-9">{{ $profile->experience ?? 'No experience provided' }}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"><strong>Education:</strong></div>
                                <div class="col-sm-9">{{ $profile->education ?? 'No education provided' }}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"><strong>Skills:</strong></div>
                                <div class="col-sm-9">{{ $profile->skills ?? 'No skills provided' }}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"><strong>Profile visibility:</strong></div>
                                <div class="col-sm-9">{{ $profile->visibility ? 'Public' : 'Private' }}</div>
                            </div>

                            @if(auth()->check() && auth()->user()->id === $profile->user_id)
                                <div class="mt-4 d-flex justify-content-center">
                                    <a href="{{ route('profile.edit',$profile->user_id) }}" class="btn btn-primary mx-2">Edit Profile</a>
                                    <form action="{{ route('profile.destroy', $profile->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete Profile</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h1 class="mt-5 mb-3">No profile found</h1>
                                <p class="text-muted">Create your profile and showcase your skills and experience.</p>
                                <a href="{{ route('profile.create') }}" class="btn btn-primary">Create Profile</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
