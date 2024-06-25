@extends('layouts.app')

@section('content')
    @can('update', $profile)
        <div class="container Custom-color">
        <h1 class="mb-4" >Edit Profile</h1>
        <form method="POST" action="{{ route('profile.update', $profile->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3 ">
                <label for="userName" class="form-label">Username:</label>
                <input type="text" class="form-control" id="userName"  name="userName" value="{{ old('userName', $profile->userName) }}" required>
            </div>

            <div class="mb-3">
                <label for="profile_photo" class="form-label">Profile Photo:</label>
                @if ($profile->profile_photo)
                    <img src="{{ asset('storage/profile_photos/' . $profile->profile_photo) }}" alt="Profile photo" class="img-thumbnail mb-3" style="max-width: 200px;">
                @else
                    <p>No profile photo</p>
                @endif
                <input type="file" class="form-control" id="profile_photo" name="profile_photo">
            </div>

            <div class="mb-3">
                <label for="biography" class="form-label">Bio:</label>
                <textarea class="form-control" id="biography" name="biography" required>{{ old('biography', $profile->biography) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="experience" class="form-label">Work Experience:</label>
                <textarea class="form-control" id="experience" name="experience" required>{{ old('experience', $profile->experience) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="education" class="form-label">Education:</label>
                <textarea class="form-control" id="education" name="education" required>{{ old('education', $profile->education) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="skills" class="form-label">Skills:</label>
                <textarea class="form-control" id="skills" name="skills" required>{{ old('skills', $profile->skills) }}</textarea>
            </div>

            <div class="form-group form-check">
                <label for="visibility" class="block mb-2 font-bold text-gray-700 text-white">Visibility:</label>
                <select name="visibility" id="visibility" required class="border border-gray-400 p-2 w-full rounded-md">
                    <option value="1">Public</option>
                    <option value="0">Private</option>
                </select>

            <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>

        </form>
        </div>


    @else
        <p class="Custom-color">You are not authorized to update this profile.</p>
    @endcan

@endsection
