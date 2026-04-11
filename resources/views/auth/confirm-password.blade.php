@extends('layouts.app')

@section('title', 'Conferma Password - Mindspace')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-custom p-4 shadow-lg border-0">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-dark"><i class="bi bi-lock text-success"></i> Area Protetta</h2>
                    <p class="text-muted small">Questa è un'area sicura dell'applicazione. Per favore, conferma la tua password prima di continuare.</p>
                </div>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="password" class="form-label small fw-bold">Password</label>
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror rounded-3 p-2" required autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary p-2 fw-bold rounded-pill">Conferma</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
