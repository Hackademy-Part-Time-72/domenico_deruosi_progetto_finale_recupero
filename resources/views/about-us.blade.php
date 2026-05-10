@extends('layouts.app')

@section('content')
<div class="row align-items-center py-5 mb-5 reveal">
    <div class="col-lg-6">
        <span class="h6 fw-800 text-uppercase tracking-widest" style="color: var(--accent);">Il Nostro Manifesto</span>
        <h1 class="display-3 fw-800 mt-2 mb-4" style="color: var(--primary);">Spazio alla Mente<span style="color: var(--accent);">.</span></h1>
        <p class="fs-5 text-secondary leading-relaxed opacity-75 mb-5">
            <strong>Mindspace</strong> è uno spazio dedicato alla divulgazione della psicologia e del benessere mentale. La nostra missione è rendere la salute mentale un argomento accessibile, comprensibile e privo di stigma.
        </p>
        <div class="d-flex gap-4">
            <div class="text-center">
                <h4 class="fw-800 mb-0" style="color: var(--primary);">10k+</h4>
                <small class="text-muted text-uppercase tracking-wider">Lettori</small>
            </div>
            <div class="vr opacity-10"></div>
            <div class="text-center">
                <h4 class="fw-800 mb-0" style="color: var(--primary);">500+</h4>
                <small class="text-muted text-uppercase tracking-wider">Articoli</small>
            </div>
            <div class="vr opacity-10"></div>
            <div class="text-center">
                <h4 class="fw-800 mb-0" style="color: var(--primary);">100%</h4>
                <small class="text-muted text-uppercase tracking-wider">Passione</small>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mt-5 mt-lg-0">
        <div class="position-relative">
            <div class="position-absolute top-0 end-0 bg-accent rounded-4 w-100 h-100 mt-4 me-4 z-n1 opacity-10"></div>
            <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=1200&q=80" alt="Team" class="img-fluid rounded-4 shadow-2xl">
        </div>
    </div>
</div>

<div class="row g-4 mb-5 reveal">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden group">
            <div class="card-body p-5">
                <div class="bg-primary-soft rounded-circle d-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                    <i class="bi bi-heart-fill text-primary fs-4"></i>
                </div>
                <h4 class="fw-800 mb-3">Empatia</h4>
                <p class="text-secondary opacity-75 mb-0">Mettiamo al centro le persone e le loro storie, con rispetto e senza alcun tipo di giudizio.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden group">
            <div class="card-body p-5 text-white" style="background-color: var(--primary);">
                <div class="bg-white rounded-circle d-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                    <i class="bi bi-lightbulb-fill text-primary fs-4"></i>
                </div>
                <h4 class="fw-800 mb-3">Chiarezza</h4>
                <p class="opacity-75 mb-0">Spieghiamo concetti complessi in modo semplice, diretto e scientificamente accurato.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden group">
            <div class="card-body p-5">
                <div class="bg-primary-soft rounded-circle d-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                    <i class="bi bi-people-fill text-primary fs-4"></i>
                </div>
                <h4 class="fw-800 mb-3">Comunità</h4>
                <p class="text-secondary opacity-75 mb-0">Crediamo nel potere del confronto sano e della condivisione protetta di esperienze.</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-5 p-5 shadow-2xl text-center reveal mb-5">
    <h2 class="fw-800 mb-3" style="color: var(--primary);">Pronto a iniziare il viaggio?</h2>
    <p class="text-secondary opacity-75 mb-5 mx-auto" style="max-width: 600px;">Esplora i nostri articoli o mettiti in contatto con noi per qualsiasi domanda o curiosità sul mondo della psicologia.</p>
    <div class="d-flex justify-content-center gap-3">
        <a href="{{ route('articles.blog') }}" class="btn btn-primary rounded-pill px-5 py-3 fw-800">Leggi il Blog</a>
        <a href="{{ route('contact') }}" class="btn btn-outline-primary rounded-pill px-5 py-3 fw-800">Contattaci</a>
    </div>
</div>

<style>
    .fw-800 { font-weight: 800; }
    .tracking-widest { letter-spacing: 0.2em; }
    .tracking-wider { letter-spacing: 0.1em; }
    .bg-primary-soft { background-color: rgba(45, 90, 39, 0.05); }
    .leading-relaxed { line-height: 1.8; }
</style>
@endsection
