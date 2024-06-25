@extends('layouts.app')

@section('content')
    @if(auth()->user()->isAdmin())
        <div class="container Custom-color">
            <h1 class="mb-4" >Edit Customer</h1>
            <form method="POST" action="{{ route('customers.update', $customer->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3 ">
                    <label for="name" class="form-label">Naam:</label>
                    <input type="text" class="form-control" id="name"  name="name" value="{{ old('name', $customer->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Telefoonnummer:</label>
                    <textarea class="form-control" id="phone" name="phone" required>{{ old('phone', $customer->phone) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Adres:</label>
                    <textarea class="form-control" id="address" name="address" required>{{ old('address', $customer->address) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">Stad:</label>
                    <textarea class="form-control" id="city" name="city" required>{{ old('education', $customer->city) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="state" class="form-label">Provincie:</label>
                    <textarea class="form-control" id="state" name="state" required>{{ old('skills', $customer->state) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="zip" class="form-label">Postcode:</label>
                    <textarea class="form-control" id="zip" name="zip" required>{{ old('skills', $customer->zip) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="country" class="form-label">Land:</label>
                    <textarea class="form-control" id="country" name="country" required>{{ old('skills', $customer->country) }}</textarea>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update Customer</button>
                </div>

            </form>
        </div>


    @else
        <p class="Custom-color">You are not authorized to update this customer.</p>
    @endcan

@endsection
