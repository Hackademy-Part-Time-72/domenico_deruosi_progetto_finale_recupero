@extends('layouts.app')

@section('title', 'Recupero Password - Mindspace')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-custom p-4 shadow-lg border-0">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-dark"><i class="bi bi-key text-success"></i> Recupero Password</h2>
                    <p class="text-muted small">Inserisci la tua email e ti invieremo un link per reimpostare la tua password.</p>
                </div>

                @if (session('status'))
                    <div class="alert alert-success border-0 rounded-3 small mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label small fw-bold">Email</label>
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror rounded-3 p-2" value="{{ old('email') }}" required autofocus placeholder="la-tua-email@esempio.it">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary p-2 fw-bold rounded-pill">Invia link di recupero</button>
                    </div>
                    
                    <div class="text-center mt-4">
                        <p class="small text-muted mb-0">Ricordi la password? <a href="{{ route('login') }}" class="text-success fw-bold text-decoration-none">Torna al login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
