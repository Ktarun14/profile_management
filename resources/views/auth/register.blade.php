@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="mb-4">Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" autofocus>
                @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}">
                @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}">
                @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <div class="mb-3">
                <label for="profile_type" class="form-label">Profile Type</label>
                <select name="profile_type" class="form-control @error('profile_type') is-invalid @enderror">
                    <option value="">-- Select Profile Type --</option>
                    <option value="personal" {{ old('profile_type') == 'personal' ? 'selected' : '' }}>Personal</option>
                    <option value="professional" {{ old('profile_type') == 'professional' ? 'selected' : '' }}>Professional</option>
                </select>
                @error('profile_type')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-success">Register</button>
        </form>
    </div>
</div>
@endsection
