@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h2 class="mb-4">Edit Profile</h2>

        <form method="POST" action="{{ route('profiles.update', $profile) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $profile->email) }}" >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="mobile_number" class="form-label">Mobile Number</label>
                <input name="mobile_number" type="text" class="form-control @error('mobile_number') is-invalid @enderror" value="{{ old('mobile_number', $profile->mobile_number) }}">
                @error('mobile_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Update Profile Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
</div>
@endsection
