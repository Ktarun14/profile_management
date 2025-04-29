@extends('layouts.app')

@section('title', 'Your Profiles')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <h2 class="mb-4">Your Profiles</h2>


        @if ($profiles->count() < 2)
            <a href="{{ route('profiles.create') }}" class="btn btn-success mb-4">Create New Profile</a>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            @foreach($profiles as $profile)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ ucfirst($profile->profile_type) }} Profile</h5>
                    <p class="card-text">
                        <strong>Email:</strong> {{ $profile->email }}<br>
                        <strong>Mobile:</strong> {{ $profile->mobile_number ?? 'N/A' }}
                    </p>

                    @if($profile->is_default)
                    <span class="badge bg-primary">Default Profile</span>
                    @else
                    <a href="{{ route('profiles.setDefault', $profile) }}" class="btn btn-outline-primary btn-sm">Set as Default</a>
                    @endif

                    <a href="{{ route('profiles.edit', $profile) }}" class="btn btn-outline-secondary btn-sm ms-2">Edit</a>
                </div>
            </div>
            @endforeach
    </div>
</div>
@endsection
