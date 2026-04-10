@extends('layouts.app')

@section('title', 'Accedi - Mindspace')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-custom p-4 shadow-lg border-0">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-dark"><i class="bi bi-flower1 text-success"></i> Accedi</h2>
                    <p class="text-muted small">Bentornato nel tuo rifugio per la mente.</p>
                </div>

                @if (session('status'))
                    <div class="alert alert-success border-0 rounded-3 small mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label small fw-bold">Email</label>
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror rounded-3 p-2" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <label for="password" class="form-label small fw-bold">Password</label>
                            @if (Route::has('password.request'))
                                <a class="small text-success text-decoration-none" href="{{ route('password.request') }}">Dimenticata?</a>
                            @endif
                        </div>
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror rounded-3 p-2" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4 form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                        <label class="form-check-label small" for="remember">Ricordami</label>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary p-2 fw-bold rounded-pill">Accedi ora</button>
                    </div>
                    
                    <div class="text-center mt-4">
                        <p class="small text-muted mb-0">Non hai un account? <a href="{{ route('register') }}" class="text-success fw-bold text-decoration-none">Unisciti a noi</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
