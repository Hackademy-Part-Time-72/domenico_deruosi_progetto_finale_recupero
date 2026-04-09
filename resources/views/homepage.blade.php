@extends('layouts.app')

@section('content')

{{-- HERO --}}
<div class="hero text-center mb-5">
    <div class="container">
        <h1 class="fw-bold display-4">Mindspace</h1>
        <p class="lead mb-4">Esplora la tua mente, trova equilibrio e benessere nel caos quotidiano.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="#" class="btn btn-light btn-lg text-success shadow-sm">Inizia a Meditare</a>
            <a href="#" class="btn btn-outline-light btn-lg shadow-sm">Leggi gli Articoli</a>
        </div>
    </div>
</div>

<div class="container">

    <div class="row align-items-center mb-5">
        <div class="col-lg-6">
            <h2 class="fw-bold mb-4">La tua dose quotidiana di consapevolezza</h2>
            <p class="text-muted fs-5">Mindspace è uno spazio dedicato alla psicologia e alla mindfulness. Qui troverai articoli scientifici, pratiche guidate e riflessioni per aiutarti a navigare le sfide della vita con serenità.</p>
            <ul class="list-unstyled">
                <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Articoli di Psicologia Cognitiva</li>
                <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Pratiche di Mindfulness</li>
                <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Strategie per il Benessere Mentale</li>
            </ul>
        </div>
        <div class="col-lg-6 text-center">
            <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Mindfulness" class="img-fluid rounded-circle shadow-lg" style="max-width: 80%;">
        </div>
    </div>

    <h2 class="mb-5 text-center fw-bold">Ultimi Approfondimenti</h2>

    <div class="row">
        @forelse($articles as $article)
        <div class="col-md-4 mb-4">
            <div class="card card-custom h-100">
                <div class="p-4 d-flex flex-column h-100">
                    <span class="badge bg-light text-success align-self-start mb-3">Articolo</span>
                    <h4 class="fw-bold mb-3">{{ $article->title }}</h4>
                    <p class="text-muted flex-grow-1">
                        {{ \Illuminate\Support\Str::limit($article->content, 120) }}
                    </p>
                    <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                        <small class="text-muted"><i class="bi bi-clock me-1"></i> 5 min lettura</small>
                        <a href="#" class="btn btn-link text-success p-0 text-decoration-none fw-bold">
                            Leggi di più <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="bi bi-journal-x display-1 text-muted mb-3"></i>
            <p class="text-muted">Nessun articolo disponibile al momento. Torna a trovarci presto!</p>
        </div>
        @endforelse
    </div>

</div>

@endsection