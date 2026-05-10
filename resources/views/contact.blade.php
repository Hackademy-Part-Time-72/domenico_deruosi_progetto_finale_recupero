@extends('layouts.app')

@section('content')
<div class="row justify-content-center py-5 reveal">
    <div class="col-lg-8">
        <!-- Minimal Header -->
        <div class="text-center mb-5">
            <span class="h6 fw-800 text-uppercase tracking-widest" style="color: var(--accent);">Mettiamoci in ascolto</span>
            <h1 class="display-4 fw-800 mt-2" style="color: var(--primary);">Contattaci<span style="color: var(--accent);">.</span></h1>
            <p class="text-secondary opacity-75 mx-auto mt-3" style="max-width: 500px;">Hai una domanda o vuoi semplicemente condividere un pensiero? Siamo qui per leggerti.</p>
        </div>

        <div class="bg-white rounded-5 shadow-2xl p-5">
            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm mb-5 rounded-4 p-4 d-flex align-items-center">
                    <i class="bi bi-check2-circle fs-4 me-3"></i>
                    <span class="fw-bold">{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                <div class="row g-5">
                    <div class="col-md-6">
                        <div class="minimal-input-group">
                            <label for="name" class="fw-800 small text-uppercase tracking-wider text-muted mb-2 d-block">Il tuo Nome</label>
                            <input type="text" name="name" id="name" class="minimal-input @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Nome e Cognome" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="minimal-input-group">
                            <label for="email" class="fw-800 small text-uppercase tracking-wider text-muted mb-2 d-block">Indirizzo Email</label>
                            <input type="email" name="email" id="email" class="minimal-input @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="esempio@email.it" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="minimal-input-group">
                            <label for="message" class="fw-800 small text-uppercase tracking-wider text-muted mb-2 d-block">Messaggio</label>
                            <textarea name="message" id="message" rows="5" class="minimal-input @error('message') is-invalid @enderror" placeholder="Cosa hai in mente?" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 text-center pt-4">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 py-3 fw-800 shadow-sm transition-all">
                            Invia Messaggio
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Simple Contact Info -->
        <div class="row mt-5 pt-4 g-4 text-center">
            <div class="col-md-4">
                <h6 class="fw-800 text-uppercase tracking-widest small mb-2" style="color: var(--accent);">Scrivici</h6>
                <p class="fw-bold">hello@mindspace.it</p>
            </div>
            <div class="col-md-4">
                <h6 class="fw-800 text-uppercase tracking-widest small mb-2" style="color: var(--accent);">Vieni a trovarci</h6>
                <p class="fw-bold">Via della Consapevolezza 12, MI</p>
            </div>
            <div class="col-md-4">
                <h6 class="fw-800 text-uppercase tracking-widest small mb-2" style="color: var(--accent);">Seguici</h6>
                <div class="d-flex justify-content-center gap-3">
                    <a href="#" class="text-dark"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-dark"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="text-dark"><i class="bi bi-twitter-x"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .fw-800 { font-weight: 800; }
    .tracking-widest { letter-spacing: 0.2em; }
    .tracking-wider { letter-spacing: 0.1em; }
    
    .shadow-2xl {
        box-shadow: 0 40px 100px -20px rgba(0,0,0,0.05);
    }

    .minimal-input {
        width: 100%;
        border: none;
        border-bottom: 2px solid #f0f0f0;
        padding: 1rem 0;
        background: transparent;
        transition: all 0.3s ease;
        font-size: 1.1rem;
    }

    .minimal-input:focus {
        outline: none;
        border-bottom-color: var(--primary);
    }

    .minimal-input::placeholder {
        color: #ccc;
        font-weight: 400;
        font-size: 0.95rem;
    }

    .minimal-input-group:hover .minimal-input {
        border-bottom-color: #ddd;
    }

    textarea.minimal-input {
        resize: none;
    }

    .transition-all {
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(45, 90, 39, 0.15) !important;
    }
</style>
@endsection
