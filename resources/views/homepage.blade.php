@extends('layouts.app')

@section('title', 'Mindspace - La tua dose quotidiana di consapevolezza')

@section('content')

{{-- CITAZIONE ANIMATA CON IMMAGINE --}}
<div class="py-5 text-center fade-in" style="background: linear-gradient(rgba(255,255,255,0.7), rgba(255,255,255,0.7)), url('https://images.pexels.com/photos/33596970/pexels-photo-33596970.jpeg?auto=compress&cs=tinysrgb&w=1600'); background-size: cover; background-position: center; border-radius: 0 0 50px 50px;">
    <div class="container py-5">
        <blockquote class="blockquote">
            <p class="fs-2 fw-light fst-italic text-dark mb-4">“Se ascoltiamo dalla mente silenziosa, ogni canto di uccello e ogni sussurro dei rami di pino nel vento ci parleranno.”</p>
            <footer class="blockquote-footer mt-2 fs-5 text-success">Thich Nhat Hanh</footer>
        </blockquote>
    </div>
</div>

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

    {{-- SEZIONE MISSION - MINIMALISTA --}}
    <div class="row justify-content-center mb-5 py-5 text-center">
        <div class="col-lg-8">
            <span class="text-success fw-bold text-uppercase tracking-wider mb-2 d-block small">Benvenuto nel tuo spazio</span>
            <h2 class="fw-bold mb-4 display-5 text-dark">La tua dose quotidiana di consapevolezza</h2>
            <p class="text-muted fs-5 mb-5 mx-auto" style="max-width: 700px;">Mindspace è il blog italiano dedicato interamente alla psicologia e alla mindfulness. Qui troverai approfondimenti scientifici, riflessioni e pratiche guidate per migliorare la tua salute mentale e vivere con maggiore presenza.</p>
            
            <div class="row g-4 justify-content-center">
                <div class="col-6 col-md-3">
                    <div class="p-3">
                        <i class="bi bi-journal-text text-success fs-3 d-block mb-2"></i>
                        <span class="fw-semibold text-dark small">Psicologia</span>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-3">
                        <i class="bi bi-stars text-success fs-3 d-block mb-2"></i>
                        <span class="fw-semibold text-dark small">Benessere</span>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-3">
                        <i class="bi bi-wind text-success fs-3 d-block mb-2"></i>
                        <span class="fw-semibold text-dark small">Mindfulness</span>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-3">
                        <i class="bi bi-shield-check text-success fs-3 d-block mb-2"></i>
                        <span class="fw-semibold text-dark small">Salute Mentale</span>
                    </div>
                </div>
            </div>
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
                        <div class="mb-3 d-flex justify-content-between align-items-start">
                            <span class="badge bg-light text-success py-2 px-3">Articolo</span>
                            <div class="text-end">
                                @foreach($article->tags as $tag)
                                    <span class="badge bg-success text-white small" style="font-size: 0.7rem;">#{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        <h4 class="fw-bold mb-1 text-dark">{{ $article->title }}</h4>
                        <small class="text-muted mb-3 d-block"><i class="bi bi-person me-1"></i> Di {{ $article->user?->name ?? 'Autore sconosciuto' }}</small>
                        
                        <p class="text-muted flex-grow-1">
                            {{ \Illuminate\Support\Str::limit($article->content, 130) }}
                        </p>
                        <div class="mt-auto pt-4 border-top d-flex justify-content-between align-items-center">
                            <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> {{ $article->created_at?->format('d/m/Y') ?? '--/--/----' }}</small>
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
