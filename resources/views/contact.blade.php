@extends('layouts.app')

@section('content')
<div class="row justify-content-center py-5">
    <div class="col-lg-10">
        <div class="card border-0 shadow-2xl rounded-5 overflow-hidden">
            <div class="row g-0">
                <div class="col-lg-5 bg-primary p-5 text-white d-flex flex-column justify-content-between">
                    <div>
                        <span class="h6 fw-800 text-uppercase tracking-widest opacity-50">Contatti</span>
                        <h2 class="display-5 fw-800 mt-2 mb-4">Entra in Contatto<span style="color: var(--accent);">.</span></h2>
                        <p class="opacity-75 mb-5 leading-relaxed">Siamo qui per ascoltarti. Che tu abbia una domanda, un suggerimento o semplicemente voglia condividere un pensiero, non esitare a scriverci.</p>
                        
                        <div class="d-flex flex-column gap-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-white bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="bi bi-geo-alt-fill text-accent"></i>
                                </div>
                                <div>
                                    <small class="d-block opacity-50 text-uppercase tracking-wider fw-bold">Indirizzo</small>
                                    <span class="fw-bold">Via della Consapevolezza 12, Milano</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-white bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="bi bi-envelope-fill text-accent"></i>
                                </div>
                                <div>
                                    <small class="d-block opacity-50 text-uppercase tracking-wider fw-bold">Email</small>
                                    <span class="fw-bold">hello@mindspace.it</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-5 pt-5 border-top border-white border-opacity-10">
                        <div class="d-flex gap-3">
                            <a href="#" class="btn btn-sm btn-outline-light rounded-circle p-2" style="width: 40px; height: 40px;"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-light rounded-circle p-2" style="width: 40px; height: 40px;"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-light rounded-circle p-2" style="width: 40px; height: 40px;"><i class="bi bi-twitter-x"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-7 bg-white p-5">
                    @if(session('success'))
                        <div class="alert alert-success border-0 shadow-sm mb-4 rounded-4 p-4 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                            <div>
                                <span class="fw-bold d-block">Messaggio Inviato!</span>
                                <small>{{ session('success') }}</small>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-800 small text-uppercase tracking-wider text-muted">Nome</label>
                                <input type="text" name="name" id="name" class="form-control rounded-4 px-4 py-3 bg-light border-0 @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Il tuo nome" required>
                                @error('name')
                                    <div class="invalid-feedback ps-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label fw-800 small text-uppercase tracking-wider text-muted">Email</label>
                                <input type="email" name="email" id="email" class="form-control rounded-4 px-4 py-3 bg-light border-0 @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="tu@email.it" required>
                                @error('email')
                                    <div class="invalid-feedback ps-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="message" class="form-label fw-800 small text-uppercase tracking-wider text-muted">Messaggio</label>
                                <textarea name="message" id="message" rows="6" class="form-control rounded-4 p-4 bg-light border-0 @error('message') is-invalid @enderror" placeholder="Come possiamo aiutarti?" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback ps-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 pt-3">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 py-3 fw-800 w-100 shadow-sm">
                                    Invia Messaggio
                                    <i class="bi bi-send-fill ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .fw-800 { font-weight: 800; }
    .tracking-widest { letter-spacing: 0.2em; }
    .tracking-wider { letter-spacing: 0.1em; }
    .leading-relaxed { line-height: 1.8; }
</style>
@endsection
