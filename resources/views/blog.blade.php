@extends('layouts.app')

@section('content')
<div class="mb-5 py-4">
    <h1 class="display-4 fw-bold section-title" style="color: #2d5a27;">Il Nostro Blog</h1>
    <p class="lead text-secondary">Esplora approfondimenti sulla psicologia e sulla crescita personale.</p>
</div>

<div class="row">
    @forelse($articles as $article)
        <div class="col-md-6 col-lg-4 mb-5">
            <div class="custom-card h-100 shadow-sm">
                <div class="card-img-wrapper">
                    @if($article->tags->first())
                        <span class="card-category">{{ $article->tags->first()->name }}</span>
                    @endif
                    <img src="https://picsum.photos/seed/{{ $article->id }}/600/400" class="card-img-top w-100" alt="{{ $article->title }}">
                </div>
                
                <div class="card-content">
                    <div class="card-meta">
                        <span class="me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#2d5a27" class="bi bi-calendar3 me-1" viewBox="0 0 16 16">
                                <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                            {{ $article->created_at->format('d M Y') }}
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#2d5a27" class="bi bi-person-fill me-1" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            {{ $article->user->name }}
                        </span>
                    </div>
                    
                    <h3 class="h5 fw-bold mb-3">
                        <a href="{{ route('articles.show', $article) }}" class="text-decoration-none text-dark hover-green">{{ $article->title }}</a>
                    </h3>
                    
                    <p class="text-muted small mb-4">
                        {{ Str::limit($article->content, 120) }}
                    </p>
                    
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <div class="tags-container">
                            @foreach($article->tags->take(2) as $tag)
                                <span class="badge rounded-pill bg-light text-success border-success-subtle border px-2 py-1" style="font-size: 0.65rem;">#{{ $tag->name }}</span>
                            @endforeach
                        </div>
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-sm btn-outline-success rounded-pill px-3">Leggi</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <p class="fs-4 text-muted">Nessun articolo pubblicato.</p>
        </div>
    @endforelse
</div>

<style>
    .hover-green:hover {
        color: #2d5a27 !important;
    }
</style>
@endsection
