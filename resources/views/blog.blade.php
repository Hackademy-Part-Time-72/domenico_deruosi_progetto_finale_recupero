@extends('layouts.app')

@section('content')
<div class="row align-items-end mb-5 py-5 reveal">
    <div class="col-lg-8">
        <span class="h6 fw-800 text-uppercase tracking-widest" style="color: var(--accent);">Archivio Mindspace</span>
        <h1 class="display-3 fw-800 mt-2 mb-0" style="color: var(--primary);">Il Nostro Blog<span style="color: var(--accent);">.</span></h1>
    </div>
    <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
        <p class="text-secondary opacity-75 mb-0 fs-5">Esplora la nostra collezione di riflessioni e approfondimenti psicologici.</p>
    </div>
</div>

<div class="row g-5">
    @forelse($articles as $article)
        <div class="col-lg-4 col-md-6 mb-5 reveal">
            <div class="article-card-minimal">
                <a href="{{ route('articles.show', $article) }}" class="text-decoration-none">
                    <div class="overflow-hidden rounded-4 mb-4 position-relative" style="height: 280px;">
                        @if($article->tags->first())
                            <span class="position-absolute top-0 start-0 m-3 badge bg-white text-primary rounded-pill px-3 py-2 small fw-800 shadow-sm z-3">
                                #{{ $article->tags->first()->name }}
                            </span>
                        @endif
                        <img src="https://picsum.photos/seed/{{ $article->id }}/800/600" class="w-100 h-100 object-fit-cover transition-transform" alt="{{ $article->title }}">
                    </div>
                </a>
                
                <div class="ps-1">
                    <div class="d-flex align-items-center gap-3 mb-3 small text-muted text-uppercase tracking-wider fw-bold">
                        <span>{{ $article->created_at->format('d M Y') }}</span>
                        <span class="bg-accent" style="width: 4px; height: 4px; border-radius: 50%;"></span>
                        <span>{{ $article->user->name }}</span>
                    </div>
                    
                    <h2 class="h4 fw-800 mb-3">
                        <a href="{{ route('articles.show', $article) }}" class="text-decoration-none text-dark hover-primary">{{ $article->title }}</a>
                    </h2>
                    
                    <p class="text-secondary small mb-4 opacity-75 line-clamp-3">
                        {{ Str::limit($article->content, 140) }}
                    </p>
                    
                    <a href="{{ route('articles.show', $article) }}" class="text-decoration-none text-primary fw-800 small text-uppercase tracking-widest">
                        Continua a Leggere &rarr;
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5 reveal">
            <div class="bg-white rounded-5 p-5 shadow-sm border border-dashed">
                <h3 class="text-muted fw-bold">Nessun articolo trovato</h3>
                <p>Torna presto per nuove riflessioni.</p>
            </div>
        </div>
    @endforelse
</div>

<style>
    .fw-800 { font-weight: 800; }
    .tracking-widest { letter-spacing: 0.15em; }
    .tracking-wider { letter-spacing: 0.1em; }
    .hover-primary:hover { color: var(--primary) !important; }
    
    .transition-transform {
        transition: transform 0.8s cubic-bezier(0.2, 1, 0.3, 1);
    }
    
    .article-card-minimal:hover .transition-transform {
        transform: scale(1.05);
    }
    
    .object-fit-cover { object-fit: cover; }
    
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .border-dashed { border-style: dashed !important; border-width: 2px !important; }
</style>
@endsection
