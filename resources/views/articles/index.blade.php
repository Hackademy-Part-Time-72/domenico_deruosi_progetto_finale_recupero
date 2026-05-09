@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-5 py-3">
    <div>
        <h1 class="fw-bold mb-0" style="color: #2d5a27;">Gestione Articoli</h1>
        <p class="text-muted mb-0">Hai pubblicato <strong>{{ $articles->count() }}</strong> articoli finora.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('articles.blog') }}" class="btn btn-outline-success shadow-sm rounded-pill px-4">
            Visualizza Blog
        </a>
        <a href="{{ route('articles.create') }}" class="btn btn-primary shadow-sm rounded-pill px-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg me-1" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg>
            Crea Nuovo
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show rounded-4" role="alert">
        <div class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
    @forelse($articles as $article)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="custom-card h-100 shadow-sm">
                <div class="card-img-wrapper" style="height: 160px;">
                    <img src="https://picsum.photos/seed/{{ $article->id }}/600/400" class="card-img-top w-100" alt="{{ $article->title }}">
                    <div class="position-absolute top-0 end-0 p-2">
                        <span class="badge bg-white text-dark shadow-sm">{{ $article->created_at->format('d/m/Y') }}</span>
                    </div>
                </div>
                
                <div class="card-content p-3">
                    <h5 class="fw-bold mb-2 text-truncate">{{ $article->title }}</h5>
                    <p class="text-muted small mb-3">{{ Str::limit($article->content, 80) }}</p>
                    
                    <div class="d-flex gap-2">
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-sm btn-light border rounded-pill" title="Visualizza">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8s0 8 0 8 3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                        </a>
                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-outline-warning rounded-pill flex-grow-1">Modifica</a>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" class="flex-grow-1" onsubmit="return confirm('Sei sicuro di voler eliminare questo articolo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill w-100">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <div class="bg-white rounded-5 p-5 shadow-sm border">
                <h3 class="text-muted fw-bold">Nessun articolo trovato</h3>
                <p>Non hai ancora scritto nessun articolo. Comincia ora!</p>
                <a href="{{ route('articles.create') }}" class="btn btn-primary rounded-pill px-4 mt-2">Crea il tuo primo articolo</a>
            </div>
        </div>
    @endforelse
</div>
@endsection
