@extends('layouts.app')

@section('content')
<div class="row justify-content-center py-5 reveal">
    <div class="col-lg-5">
        <div class="card border-0 shadow-2xl rounded-5 overflow-hidden">
            <div class="card-body p-5">
                <div class="text-center mb-5">
                    <h2 class="display-6 fw-800 mb-2" style="color: var(--primary);">Bentornato</h2>
                    <p class="text-secondary opacity-75">Accedi per gestire i tuoi articoli su Mindspace.</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label fw-800 text-uppercase small tracking-wider mb-3" style="color: var(--accent);">Email</label>
                        <input type="email" name="email" id="email" 
                            class="form-control form-control-lg border-0 bg-light rounded-4 px-4 py-3 @error('email') is-invalid @enderror" 
                            value="{{ old('email') }}" required autofocus placeholder="indirizzo@email.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-800 text-uppercase small tracking-wider mb-3" style="color: var(--accent);">Password</label>
                        <input type="password" name="password" id="password" 
                            class="form-control form-control-lg border-0 bg-light rounded-4 px-4 py-3 @error('password') is-invalid @enderror" 
                            required placeholder="••••••••">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-5 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label small text-muted" for="remember">
                                Ricordami su questo dispositivo
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 py-3 shadow-lg w-100 fw-bold">
                        Accedi alla Dashboard &rarr;
                    </button>
                </form>

                <div class="text-center mt-5">
                    <p class="small text-muted mb-0">Non hai ancora un account? 
                        <a href="{{ route('register') }}" class="text-primary fw-bold text-decoration-none">Registrati ora</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .fw-800 { font-weight: 800; }
    .tracking-wider { letter-spacing: 0.1em; }
    .shadow-2xl { box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08); }
    .bg-light { background-color: #f8f9fa !important; }
    .form-control:focus {
        background-color: #fff !important;
        box-shadow: 0 0 0 4px var(--primary-soft);
        outline: none;
    }
</style>
@endsection
