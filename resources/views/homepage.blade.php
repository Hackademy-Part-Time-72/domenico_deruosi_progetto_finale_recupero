@extends('layouts.app')

@section('content')
<style>
    .article-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #dee2e6 !important;
    }
    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.175) !important;
        border-color: #0d6efd !important;
    }
    .card-title-link {
        color: inherit;
        text-decoration: none;
    }
    .card-title-link:hover {
        color: #0d6efd;
    }
</style>

<div class="bg-dark text-white py-5 mb-5 rounded shadow">
    <div class="container">
        <h1 class="display-3 fw-bold text-center">Psychology & Well-being Blog</h1>
        <p class="lead text-center">Exploring the mind, body, and soul.</p>
    </div>
</div>

<div class="row">
    @forelse($articles as $article)
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm article-card">
                <div class="card-body">
                    <h2 class="h4 card-title">
                        <a href="{{ route('articles.show', $article) }}" class="card-title-link">{{ $article->title }}</a>
                    </h2>
                    <p class="text-muted small mb-3 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event me-2" viewBox="0 0 16 16">
                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg>
                        {{ $article->created_at->format('M d, Y') }} 
                        <span class="mx-2">•</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person me-2" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                        {{ $article->user->name }}
                    </p>
                    <p class="card-text text-secondary">{{ Str::limit($article->content, 180) }}</p>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-4 px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            @foreach($article->tags as $tag)
                                <span class="badge rounded-pill bg-light text-primary border border-primary me-1">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-sm btn-primary rounded-pill px-3 shadow-sm">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <p class="fs-4 text-muted">No articles published yet. Check back soon!</p>
        </div>
    @endforelse
</div>
@endsection
