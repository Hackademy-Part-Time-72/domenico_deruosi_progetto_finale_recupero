@extends('layouts.app')

@section('content')
<div class="row justify-content-center py-5">
    <div class="col-md-7">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header border-0 pt-5 pb-4 px-5 bg-white text-center">
                <h2 class="fw-bold mb-2" style="color: #2d5a27;">Inviaci un Messaggio</h2>
                <p class="text-muted">Siamo qui per ascoltarti e supportarti nel tuo percorso.</p>
            </div>
            <div class="card-body p-5 pt-2">
                @if(session('success'))
                    <div class="alert alert-success border-0 shadow-sm mb-4 rounded-pill px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold small text-uppercase" style="color: #2d5a27;">Nome Completo</label>
                        <input type="text" name="name" id="name" class="form-control rounded-pill px-4 py-3 bg-light border-0 @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Inserisci il tuo nome" required>
                        @error('name')
                            <div class="invalid-feedback ps-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label fw-bold small text-uppercase" style="color: #2d5a27;">Indirizzo Email</label>
                        <input type="email" name="email" id="email" class="form-control rounded-pill px-4 py-3 bg-light border-0 @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="esempio@email.it" required>
                        @error('email')
                            <div class="invalid-feedback ps-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="message" class="form-label fw-bold small text-uppercase" style="color: #2d5a27;">Il tuo Messaggio</label>
                        <textarea name="message" id="message" rows="5" class="form-control rounded-4 p-4 bg-light border-0 @error('message') is-invalid @enderror" placeholder="Come possiamo aiutarti?" required>{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback ps-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 py-3 shadow-sm w-100">
                            Invia Messaggio
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-send-fill ms-2" viewBox="0 0 16 16">
                                <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
