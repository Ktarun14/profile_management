@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Welcome, {{ Auth::user()->first_name }}!</h2>

        <div class="alert alert-info">
            This is your dashboard.
        </div>

    </div>
</div>
@endsection
