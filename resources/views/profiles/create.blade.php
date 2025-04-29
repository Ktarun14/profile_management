@extends('layouts.app')

@section('title', 'Create Profile')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h2 class="mb-4">Create Profile</h2>

        <form method="POST" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="profile_type" class="form-label">Profile Type</label>
                <select name="profile_type" class="form-select @error('profile_type') is-invalid @enderror" >
                    <option value="">-- Select Type --</option>
                    <option value="personal" {{ old('profile_type') == 'personal' ? 'selected' : '' }}>Personal</option>
                    <option value="professional" {{ old('profile_type') == 'professional' ? 'selected' : '' }}>Professional</option>
                </select>
                @error('profile_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" value="{{ old('email') }}" >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="mobile_number" class="form-label">Mobile Number</label>
                <input name="mobile_number" type="text" class="form-control @error('mobile_number') is-invalid @enderror" placeholder="Enter Mobile Number" value="{{ old('mobile_number') }}">
                @error('mobile_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Profile Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Create Profile</button>
        </form>
    </div>
</div>
@endsection
