@extends('layouts.app')

@section('content')
    <div class="container Custom-color">
        <h1 class="mb-4">{{ isset($user) ? 'Create Profile for '.$user->name : 'Create Profile' }}</h1>
        <form method="POST" action="{{ isset($user) ? route('profile.storeForUser', $user) : route('profile.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Display the form fields for creating a profile -->
            <div class="form-group">
                <label for="userName">User Name</label>
                <input type="text" class="form-control @error('userName') is-invalid @enderror" id="userName" name="userName" value="{{ old('userName') }}" required>
            </div>

            <!-- Display the file upload field for the profile photo -->
            <div class="form-group">
                <label for="profile_photo">Profile Photo</label>
                <input type="file" class="form-control-file @error('profile_photo') is-invalid @enderror" id="profile_photo" name="profile_photo"  value="{{ old('profile_photo') }}" required>
            </div>

            <!-- Display the form fields for the profile information -->
            <div class="form-group">
                <label for="biography">Biography</label>
                <textarea class="form-control @error('biography') is-invalid @enderror" id="biography" name="biography" rows="3" required>{{ old('biography') }}</textarea>
            </div>

            <div class="form-group">
                <label for="experience">Experience</label>
                <textarea class="form-control @error('experience') is-invalid @enderror" id="experience" name="experience" rows="3" required>{{ old('experience') }}</textarea>
            </div>

            <div class="form-group">
                <label for="education">Education</label>
                <textarea class="form-control @error('education') is-invalid @enderror" id="education" name="education" rows="3" required>{{ old('education') }}</textarea>
            </div>

            <div class="form-group">
                <label for="skills">Skills</label>
                <textarea class="form-control @error('skills') is-invalid @enderror" id="skills" name="skills" rows="3" required>{{ old('skills') }}</textarea>
            </div>

            <div class="form-group form-check">
                <label for="visibility" class="block mb-2 font-bold text-gray-700 text-white">Visibility:</label>
                <select name="visibility" id="visibility" required class="border border-gray-400 p-2 w-full rounded-md">
                    <option value="1">Public</option>
                    <option value="0">Private</option>
                </select>
            </div>

            <!-- Display the submit button -->
            <button type="submit" class="btn btn-primary">Create Profile</button>
        </form>
    </div>
@endsection
