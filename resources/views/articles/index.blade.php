@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="fw-bold text-dark mb-0">I Miei Articoli</h1>
        <a href="{{ route('articles.create') }}" class="btn btn-primary px-4 shadow-sm">
            <i class="bi bi-plus-lg me-2"></i> Nuovo Articolo
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">
        @forelse($articles as $article)
        <div class="col-md-6 mb-4">
            <div class="card-custom h-100 overflow-hidden border-0 shadow-sm bg-white">
                @if($article->thumbnail)
                <img src="{{ $article->thumbnail }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                @endif
                <div class="p-4 d-flex flex-column h-100">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="d-flex flex-wrap gap-1">
                            <span class="badge bg-light text-success py-2 px-3">Articolo</span>
                            @foreach($article->tags as $tag)
                                <span class="badge bg-success text-white py-2 px-2" style="font-size: 0.7rem;">#{{ $tag->name }}</span>
                            @endforeach
                        </div>
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
                    </div>
                    
                    <h4 class="fw-bold mb-1">{{ $article->title }}</h4>
                    <small class="text-muted mb-3 d-block"><i class="bi bi-person me-1"></i> Di {{ $article->user->name }}</small>
                    
                    <p class="text-muted flex-grow-1 mb-4">
                        {{ \Illuminate\Support\Str::limit($article->content, 150) }}
                    </p>

                    <div class="mt-auto d-flex justify-content-between align-items-center pt-3 border-top">
                        <div class="small text-muted">
                            <i class="bi bi-calendar3 me-1"></i> {{ $article->created_at->format('d/m/Y') }}
                        </div>
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-link text-success p-0 text-decoration-none fw-bold">
                            Dettagli <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="card-custom p-5 bg-white">
                <i class="bi bi-journal-text display-1 text-muted mb-3"></i>
                <h3 class="fw-bold">Nessun articolo trovato</h3>
                <p class="text-muted">Inizia a scrivere il tuo primo articolo di psicologia o mindfulness.</p>
                <a href="{{ route('articles.create') }}" class="btn btn-primary mt-3">Crea il tuo primo articolo</a>
            </div>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $articles->links() }}
    </div>
</div>
@endsection
