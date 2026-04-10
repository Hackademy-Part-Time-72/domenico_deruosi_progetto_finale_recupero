@extends('layouts.app')

@section('content')

{{-- HERO --}}
<div class="hero text-center mb-5">
    <div class="container">
        <h1 class="fw-bold display-3 mb-3">Mindspace</h1>
        <p class="lead mb-4 fs-4">Esplora la tua mente, trova l'equilibrio e il benessere interiore.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('register') }}" class="btn btn-light btn-lg text-success shadow-sm rounded-pill px-4">Inizia Ora</a>
            <a href="#articoli" class="btn btn-outline-light btn-lg shadow-sm rounded-pill px-4">Leggi gli Articoli</a>
        </div>
    </div>
</div>

<div class="container">

    <div class="row align-items-center mb-5 py-5">
        <div class="col-lg-6">
            <h2 class="fw-bold mb-4 display-5 text-dark">La tua dose quotidiana di consapevolezza</h2>
            <p class="text-muted fs-5 mb-4">Mindspace è il blog italiano dedicato interamente alla psicologia e alla mindfulness. Qui troverai approfondimenti scientifici, riflessioni e pratiche guidate per migliorare la tua salute mentale e vivere con maggiore presenza.</p>
            <ul class="list-unstyled">
                <li class="mb-3 d-flex align-items-center"><i class="bi bi-check2-circle text-success me-3 fs-4"></i> Articoli di Psicologia e Benessere</li>
                <li class="mb-3 d-flex align-items-center"><i class="bi bi-check2-circle text-success me-3 fs-4"></i> Tecniche di Mindfulness e Meditazione</li>
                <li class="mb-3 d-flex align-items-center"><i class="bi bi-check2-circle text-success me-3 fs-4"></i> Strategie per la Gestione dello Stress</li>
            </ul>
        </div>
        <div class="col-lg-6 text-center">
            <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Mindfulness" class="img-fluid rounded-circle shadow-lg border border-5 border-white" style="max-width: 80%;">
        </div>
    </div>

    <div id="articoli">
        <h2 class="mb-5 text-center fw-bold display-6">Ultimi Approfondimenti</h2>

        <div class="row">
            @forelse($articles as $article)
            <div class="col-md-4 mb-4">
                <div class="card card-custom h-100 border-0">
                    @if($article->thumbnail)
                    <img src="{{ $article->thumbnail }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="p-4 d-flex flex-column h-100">
                        <div class="mb-3">
                            <span class="badge bg-light text-success align-self-start py-2 px-3">Articolo</span>
                        </div>
                        <h4 class="fw-bold mb-3 text-dark">{{ $article->title }}</h4>
                        <p class="text-muted flex-grow-1">
                            {{ \Illuminate\Support\Str::limit($article->content, 130) }}
                        </p>
                        <div class="mt-auto pt-4 border-top d-flex justify-content-between align-items-center">
                            <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> {{ $article->created_at->format('d/m/Y') }}</small>
                            <a href="{{ route('articles.show', $article) }}" class="btn btn-link text-success p-0 text-decoration-none fw-bold">
                                Leggi <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-journal-x display-1 text-muted mb-3"></i>
                <p class="text-muted fs-5">Nessun articolo disponibile al momento. Torna a trovarci presto!</p>
            </div>
            @endforelse
        </div>
    </div>

</div>

@endsection
