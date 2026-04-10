@extends('layouts.app')

@section('title', 'Unisciti a noi - Mindspace')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-custom p-4 shadow-lg border-0">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-dark"><i class="bi bi-flower1 text-success"></i> Unisciti a noi</h2>
                    <p class="text-muted small">Inizia il tuo viaggio verso la consapevolezza.</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label small fw-bold">Nome</label>
                        <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror rounded-3 p-2" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label small fw-bold">Email</label>
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror rounded-3 p-2" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password" class="form-label small fw-bold">Password</label>
                                <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror rounded-3 p-2" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label small fw-bold">Conferma Password</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control rounded-3 p-2" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary p-2 fw-bold rounded-pill">Crea il mio account</button>
                    </div>
                    
                    <div class="text-center mt-4">
                        <p class="small text-muted mb-0">Hai già un account? <a href="{{ route('login') }}" class="text-success fw-bold text-decoration-none">Accedi ora</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
