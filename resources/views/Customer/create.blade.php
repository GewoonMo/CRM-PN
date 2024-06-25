@extends('layouts.app')

@section('content')
    <div class="container Custom-color">
        <h1 class="mb-4">{{ 'Create Customer'}}</h1>
        <form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Display a dropdown to select the user -->
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" id="user_id">
                    {{$users = \App\Models\User::pluck('name', 'id')}}
                    @foreach($users as $userId => $userName)
                        <option value="{{ $userId }}">{{ $userName }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Display the form fields for creating a profile -->
            <div class="form-group">
                <label for="userName">Naam</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <!-- Display the form fields for the profile information -->
            <div class="form-group">
                <label for="biography">Telefoonnummer</label>
                <textarea class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" rows="3" required>{{ old('phone') }}</textarea>
            </div>

            <div class="form-group">
                <label for="experience">Adres</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
            </div>

            <div class="form-group">
                <label for="education">Stad</label>
                <textarea class="form-control @error('city') is-invalid @enderror" id="city" name="city" rows="3" required>{{ old('city') }}</textarea>
            </div>

            <div class="form-group">
                <label for="skills">Provincie</label>
                <textarea class="form-control @error('state') is-invalid @enderror" id="state" name="state" rows="3" required>{{ old('state') }}</textarea>
            </div>

            <div class="form-group">
                <label for="skills">Postcode</label>
                <textarea class="form-control @error('zip') is-invalid @enderror" id="zip" name="zip" rows="3" required>{{ old('zip') }}</textarea>
            </div>

            <div class="form-group">
                <label for="skills">Land</label>
                <textarea class="form-control @error('country') is-invalid @enderror" id="country" name="country" rows="3" required>{{ old('country') }}</textarea>
            </div>

            <!-- Display the submit button -->
            <button type="submit" class="btn btn-primary">Create Profile</button>
        </form>
    </div>
@endsection
