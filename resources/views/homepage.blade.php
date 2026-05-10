@extends('layouts.app')

@section('content')
<!-- Premium Minimal Hero Section -->
<div class="row min-vh-75 align-items-center justify-content-center text-center reveal mb-5">
    <div class="col-lg-10">
        <span class="h6 fw-800 text-uppercase tracking-widest mb-3 d-block" style="color: var(--accent);">Spazio alla Mente</span>
        <h1 class="display-1 fw-800 mb-4" style="color: var(--primary); letter-spacing: -4px; line-height: 0.9;">
            Mindspace<span style="color: var(--accent);">.</span>
        </h1>
        <p class="lead text-secondary fs-3 mb-5 mx-auto px-lg-5" style="max-width: 800px; font-weight: 400; opacity: 0.8;">
            Esplora la psicologia moderna attraverso una lente di <span class="fw-bold text-dark">consapevolezza</span> e benessere. Un rifugio digitale per la tua crescita personale.
        </p>
        <div class="d-flex gap-3 justify-content-center">
            <a href="{{ route('articles.blog') }}" class="btn btn-primary btn-lg px-5 py-3 shadow-lg rounded-pill fw-bold">
                Inizia l'Esplorazione
            </a>
            <a href="{{ route('about.us') }}" class="btn btn-outline-dark btn-lg px-5 py-3 border-2 rounded-pill fw-bold">
                Chi Siamo
            </a>
        </div>
    </div>
</div>

<!-- Section Divider -->
<div class="row mb-5 reveal">
    <div class="col-12">
        <div class="d-flex align-items-center justify-content-between py-4 border-top border-bottom">
            <div class="d-flex align-items-center">
                <span class="h5 fw-800 mb-0 me-3 text-uppercase small tracking-widest" style="color: var(--primary);">Ultime Riflessioni</span>
                <span class="badge rounded-pill bg-primary-soft text-primary px-3 py-2 small fw-bold">Top 10</span>
            </div>
            <a href="{{ route('articles.blog') }}" class="text-decoration-none text-dark fw-bold small text-uppercase tracking-wider hover-accent">
                Archivio Completo &rarr;
            </a>
        </div>
    </div>
</div>

<!-- Premium Article Grid -->
<div class="row g-5">
    @forelse($articles as $article)
        <div class="col-md-6 mb-5 reveal">
            <div class="premium-article-card">
                <a href="{{ route('articles.show', $article) }}" class="text-decoration-none group">
                    <div class="overflow-hidden rounded-4 mb-4 position-relative" style="height: 400px;">
                        <div class="card-overlay"></div>
                        <img src="https://picsum.photos/seed/{{ $article->id }}/1200/800" class="w-100 h-100 object-fit-cover transition-transform" alt="{{ $article->title }}">
                        <div class="card-tags position-absolute top-0 start-0 p-4">
                            @foreach($article->tags->take(1) as $tag)
                                <span class="badge bg-white text-primary rounded-pill px-3 py-2 small fw-800 shadow-sm">#{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </a>
                
                <div class="ps-1">
                    <div class="d-flex align-items-center gap-3 mb-3 small text-muted text-uppercase tracking-wider fw-bold">
                        <span>{{ $article->created_at->format('d M Y') }}</span>
                        <span class="dot"></span>
                        <span>{{ $article->user->name }}</span>
                    </div>
                    
                    <h2 class="h2 fw-800 mb-3">
                        <a href="{{ route('articles.show', $article) }}" class="text-decoration-none text-dark hover-primary transition-all">{{ $article->title }}</a>
                    </h2>
                    
                    <p class="text-secondary mb-4 opacity-75 fs-5 leading-relaxed">
                        {{ Str::limit($article->content, 130) }}
                    </p>
                    
                    <a href="{{ route('articles.show', $article) }}" class="text-decoration-none text-primary fw-800 small text-uppercase tracking-widest read-more-link">
                        Leggi l'articolo <span class="arrow">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <div class="bg-white rounded-5 p-5 shadow-sm border border-dashed">
                <h3 class="text-muted fw-bold">Ancora nessuna riflessione pubblicata.</h3>
                <p>Torna a trovarci presto.</p>
            </div>
        </div>
    @endforelse
</div>

<style>
    .fw-800 { font-weight: 800; }
    .tracking-widest { letter-spacing: 0.3em; }
    .tracking-wider { letter-spacing: 0.15em; }
    .min-vh-75 { min-height: 75vh; }
    .leading-relaxed { line-height: 1.8; }
    
    .hover-primary:hover { color: var(--primary) !important; }
    .hover-accent:hover { color: var(--accent) !important; }
    
    .dot {
        width: 4px;
        height: 4px;
        background-color: var(--accent);
        border-radius: 50%;
    }
    
    .premium-article-card {
        transition: all 0.4s ease;
    }
    
    .transition-transform {
        transition: transform 1.2s cubic-bezier(0.2, 1, 0.3, 1);
    }
    
    .premium-article-card:hover .transition-transform {
        transform: scale(1.08);
    }
    
    .card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.05) 100%);
        z-index: 1;
        pointer-events: none;
    }
    
    .object-fit-cover { object-fit: cover; }
    
    .read-more-link {
        display: inline-flex;
        align-items: center;
        transition: gap 0.3s ease;
    }
    
    .read-more-link .arrow {
        margin-left: 8px;
        transition: transform 0.3s ease;
    }
    
    .read-more-link:hover .arrow {
        transform: translateX(5px);
    }

    .border-dashed {
        border-style: dashed !important;
        border-width: 2px !important;
    }

    .bg-primary-soft {
        background-color: rgba(45, 90, 39, 0.08);
    }
</style>
@endsection
