@extends('layouts.app')

@section('content')
<div class="row align-items-center mb-5 py-4 reveal">
    <div class="col-md-8">
        <h1 class="display-4 fw-800 mb-0" style="color: var(--primary);">Area Riservata</h1>
        <p class="text-secondary fs-5 mt-2">Bentornato. Qui puoi gestire i tuoi contributi a <span class="fw-bold">Mindspace</span>.</p>
    </div>
    <div class="col-md-4 text-md-end mt-4 mt-md-0">
        <a href="{{ route('articles.create') }}" class="btn btn-primary btn-lg shadow-lg rounded-pill px-5 fw-bold">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill me-2" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
            </svg>
            Scrivi Articolo
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show rounded-4 mb-5 reveal" role="alert">
        <div class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check2-circle me-3" viewBox="0 0 16 16">
                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
            </svg>
            <span class="fw-bold">{{ session('success') }}</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row g-4">
    @forelse($articles as $article)
        <div class="col-lg-4 col-md-6 mb-4 reveal">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden position-relative">
                <div class="position-absolute top-0 end-0 p-3 z-3">
                    <span class="badge bg-white text-dark shadow-sm px-3 py-2 rounded-pill small fw-bold">
                        {{ $article->created_at->format('d/m/Y') }}
                    </span>
                </div>
                
                <div style="height: 180px; overflow: hidden;">
                    <img src="https://picsum.photos/seed/{{ $article->id }}/800/600" class="w-100 h-100 object-fit-cover transition-transform" alt="{{ $article->title }}">
                </div>
                
                <div class="card-body p-4">
                    <h5 class="fw-800 mb-3 text-truncate">{{ $article->title }}</h5>
                    <p class="text-secondary small mb-4 opacity-75">{{ Str::limit($article->content, 90) }}</p>
                    
                    <div class="d-flex gap-2 mt-auto">
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-outline-dark rounded-pill flex-grow-1 small fw-bold">Vedi</a>
                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-outline-primary rounded-pill flex-grow-1 small fw-bold">Modifica</a>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" class="flex-grow-1" onsubmit="return confirm('Vuoi davvero cancellare questo articolo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger rounded-pill w-100 small fw-bold">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5 reveal">
            <div class="bg-white rounded-5 p-5 shadow-sm border border-dashed">
                <h3 class="text-muted fw-bold">Ancora nessuna pubblicazione</h3>
                <p class="mb-4">Il tuo spazio è pronto. Inizia a condividere le tue riflessioni con la community.</p>
                <a href="{{ route('articles.create') }}" class="btn btn-primary rounded-pill px-5 py-3 shadow fw-bold">Crea il tuo primo articolo</a>
            </div>
        </div>
    @endforelse
</div>

<style>
    .fw-800 { font-weight: 800; }
    .object-fit-cover { object-fit: cover; }
    .transition-transform { transition: transform 0.5s ease; }
    .card:hover .transition-transform { transform: scale(1.05); }
    .border-dashed { border-style: dashed !important; border-width: 2px !important; }
</style>
@endsection
