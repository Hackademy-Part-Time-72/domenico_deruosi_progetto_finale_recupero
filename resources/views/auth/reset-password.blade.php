@extends('layouts.app')

@section('title', 'Reimposta Password - Mindspace')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-custom p-4 shadow-lg border-0">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-dark"><i class="bi bi-shield-lock text-success"></i> Reimposta Password</h2>
                    <p class="text-muted small">Scegli una nuova password sicura per il tuo account.</p>
                </div>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="mb-3">
                        <label for="email" class="form-label small fw-bold">Email</label>
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror rounded-3 p-2" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label small fw-bold">Nuova Password</label>
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror rounded-3 p-2" required autocomplete="new-password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label small fw-bold">Conferma Nuova Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror rounded-3 p-2" required autocomplete="new-password">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary p-2 fw-bold rounded-pill">Reimposta Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
