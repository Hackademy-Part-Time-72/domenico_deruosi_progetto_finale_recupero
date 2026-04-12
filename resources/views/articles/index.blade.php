@extends('layouts.app')

@section('title', 'Esplora gli articoli - Mindspace')

@section('content')
<div class="container py-5">
    
    <div class="row mb-5">
        <div class="col-md-6">
            <h1 class="fw-bold text-dark mb-2">
                {{ request()->has('mine') ? 'I Miei Articoli' : 'Esplora Mindspace' }}
            </h1>
            <p class="text-muted">Scopri riflessioni, studi e pratiche di benessere.</p>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-md-end gap-2">
            @auth
            <a href="{{ route('articles.create') }}" class="btn btn-primary px-4 shadow-sm rounded-pill">
                <i class="bi bi-plus-lg me-2"></i> Nuovo
            </a>
            @endauth
        </div>
    </div>

    {{-- FILTRI E RICERCA --}}
    <div class="card-custom bg-white p-4 mb-5 shadow-sm border-0">
        <form action="{{ route('articles.index') }}" method="GET" class="row g-3">
            @if(request('mine')) <input type="hidden" name="mine" value="1"> @endif
            <div class="col-lg-5">
                <div class="input-group">
                    <span class="input-group-text bg-light border-0"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" name="search" class="form-control bg-light border-0" placeholder="Cerca titolo o contenuto..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-lg-4">
                <select name="tag" class="form-select bg-light border-0" onchange="this.form.submit()">
                    <option value="">Tutti i Tag</option>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" {{ request('tag') == $tag->id ? 'selected' : '' }}>#{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-3 d-grid">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success flex-grow-1 shadow-sm rounded-pill">Filtra</button>
                    <a href="{{ route('articles.index', request('mine') ? ['mine' => 1] : []) }}" class="btn btn-outline-secondary shadow-sm rounded-pill"><i class="bi bi-x-lg"></i></a>
                </div>
            </div>
        </form>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4 border-0 shadow-sm rounded-4" role="alert">
        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">
        @forelse($articles as $article)
        <div class="col-md-6 mb-4">
            <div class="card-custom h-100 overflow-hidden border-0 shadow-sm bg-white">
                @if($article->thumbnail)
                <img src="{{ $article->thumbnail }}" class="card-img-top" alt="{{ $article->title }}" style="height: 250px; object-fit: cover;">
                @endif
                <div class="p-4 d-flex flex-column h-100">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="d-flex flex-wrap gap-1">
                            @foreach($article->tags as $tag)
                                <a href="{{ route('articles.index', ['tag' => $tag->id]) }}" class="badge bg-success bg-opacity-10 text-success text-decoration-none py-2 px-2" style="font-size: 0.75rem;">#{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        @can('update', $article)
                        <div class="dropdown">
                            <button class="btn btn-link text-muted p-0" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                                <li><a class="dropdown-item" href="{{ route('articles.edit', $article) }}"><i class="bi bi-pencil me-2"></i> Modifica</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo articolo?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger"><i class="bi bi-trash me-2"></i> Elimina</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        @endcan
                    </div>
                    
                    <h3 class="fw-bold mb-1 text-dark">{{ $article->title }}</h3>
                    <small class="text-muted mb-3 d-block">
                        <i class="bi bi-person me-1"></i> Di {{ $article->user?->name ?? 'Autore sconosciuto' }} 
                        <span class="mx-2">|</span>
                        <i class="bi bi-calendar3 me-1"></i> {{ $article->created_at?->format('d M Y') ?? '--/--/----' }}
                    </small>
                    
                    <p class="text-muted flex-grow-1 mb-4">
                        {{ \Illuminate\Support\Str::limit($article->content, 180) }}
                    </p>

                    <div class="mt-auto pt-3 border-top">
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-link text-success p-0 text-decoration-none fw-bold">
                            Continua a leggere <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="card-custom p-5 bg-white bg-opacity-75">
                <i class="bi bi-search display-1 text-muted mb-3"></i>
                <h3 class="fw-bold">Nessun risultato</h3>
                <p class="text-muted">Nessun articolo corrisponde ai criteri di ricerca selezionati.</p>
                <a href="{{ route('articles.index') }}" class="btn btn-primary mt-3 rounded-pill px-4">Mostra tutti gli articoli</a>
            </div>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $articles->appends(request()->query())->links() }}
    </div>
</div>
@endsection
