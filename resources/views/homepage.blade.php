@extends('layouts.app')

@section('content')
<div class="bg-dark text-white py-5 mb-5 rounded shadow">
    <div class="container">
        <h1 class="display-3 fw-bold">Psychology & Well-being Blog</h1>
        <p class="lead">Exploring the mind, body, and soul.</p>
    </div>
</div>

<div class="row">
    @forelse($articles as $article)
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <h2 class="h4 card-title text-primary">{{ $article->title }}</h2>
                    <p class="text-muted small mb-2">
                        Published on {{ $article->created_at->format('M d, Y') }} 
                        by {{ $article->user->name }}
                    </p>
                    <p class="card-text">{{ Str::limit($article->content, 150) }}</p>
                    <a href="{{ route('articles.show', $article) }}" class="btn btn-link p-0 text-decoration-none fw-bold">Read more →</a>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-3">
                    @foreach($article->tags as $tag)
                        <span class="badge bg-light text-dark border">{{ $tag->name }}</span>
                    @endforeach
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
