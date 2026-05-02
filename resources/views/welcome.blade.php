@extends('layouts.app')

@section('content')
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Welcome to Laravel Fortify</h1>
        <p class="col-md-8 fs-4">This is a simple authentication system implemented with Laravel Fortify, Bootstrap 5 (CDN), and no NPM/Vite.</p>
        @guest
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg">Register</a>
        @else
            <p class="fs-5">You are logged in as {{ Auth::user()->name }}!</p>
        @endguest
    </div>
</div>
@endsection
